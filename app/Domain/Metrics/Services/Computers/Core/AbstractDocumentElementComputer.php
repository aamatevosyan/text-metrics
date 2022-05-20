<?php

namespace Domain\Metrics\Services\Computers\Core;

use App\Enums\DocumentElementType;
use App\Models\Document;
use Arr;
use Bus;
use Cache;
use DB;
use Domain\DocumentProcessing\Services\Document\DocumentElement;
use Domain\Metrics\Jobs\ApplySectionTextMetricComputingJob;
use Domain\Metrics\Models\DocumentMetricResult;
use Illuminate\Bus\Batch;
use Illuminate\Support\Collection;

abstract class AbstractDocumentElementComputer extends AbstractTextMetricComputer
{
    public function process(DocumentElement $element): ?array
    {
        if (!$this->needsProcessing($element)) {
            return null;
        }

        if ($this->isProcessingSections() || !$this->isRootElement($element)) {
            return $this->processElement($element);
        }

        return $this->isProcessingRootElement() ? $this->processRootElement($element) : null;
    }

    abstract public function isProcessingRootElement(): bool;

    abstract public function isProcessingSections(): bool;

    public function isRootElement(DocumentElement $document): bool
    {
        return $document->type === DocumentElementType::Document;
    }

    public function saveSectionResult(Document $document): void
    {
        DB::transaction(function () use ($document) {
            $query = $document->documentMetricResult()->sharedLock();
            $document->documentMetricResult->refresh();

            $section_results = $document->documentMetricResult->section_results;

            $uuids = $document->content->flatten()->pluck('uuid');

            $uuids->each(function (string $uuid) use ($document, &$section_results) {
                if (empty($section_results[$uuid])) {
                    $section_results[$uuid] = [];
                }

                $cacheKey = DocumentMetricResult::getCacheKey(
                    'section_results.'.$document->documentMetricResult->id.'.'.$this->getModel()->id.'.'
                    .$uuid,
                );

                $res = Cache::get($cacheKey, []);

                if ($res) {
                    $section_results[$uuid] = array_merge($section_results[$uuid], (array) $res);
                }
            });

            $query->update(compact('section_results'));

            $uuids->each(function (string $uuid) use ($document) {
                $cacheKey = DocumentMetricResult::getCacheKey(
                    'section_results.'.$document->documentMetricResult->id.'.'.$this->getModel()->id.'.'
                    .$uuid,
                );

                Cache::forget($cacheKey);
            });
        });
    }

    public function isReducingSectionResults(): bool
    {
        return false;
    }

    public function reduceSectionResults(string $slug, Collection $results): mixed
    {
        return $results->avg();
    }

    public function needsProcessing(DocumentElement $element): bool
    {
        return true;
    }

    public function processRootElement(DocumentElement $element): ?array
    {
        return null;
    }

    public function processElement(DocumentElement $element): ?array
    {
        return null;
    }

    public function afterAllSectionProcessing(Document $document): void
    {
        if (!$this->isReducingSectionResults()) {
            return;
        }

        DB::transaction(function () use ($document) {
            $query = $document->documentMetricResult()->sharedLock();

            $document->documentMetricResult->refresh();
            $section_results = collect($document->documentMetricResult->section_results);

            $results = [];

            foreach ($this->slugs as $slug) {
                $plucked = $section_results->pluck($slug);
                $computed = $this->reduceSectionResults($slug, $plucked);

                if ($computed) {
                    $results[$slug] = $computed;
                }
            }

            $results = array_merge(
                $document->documentMetricResult->results,
                $results,
            );

            $query->update(compact('results'));
        });
    }

    public function compute(Document $document): ?array
    {
        /** @var DocumentElement $documentElement */
        $documentElement = $document->content;

        $results = $this->isProcessingRootElement()
            ? $this->process($documentElement)
            : null;

        if ($this->isProcessingSections()) {
            $jobs = collect([
                new ApplySectionTextMetricComputingJob(
                    $this,
                    $documentElement,
                    $document->documentMetricResult->id,
                )
            ]);

            $queueId = $this->model->id % config('queue.parallel_jobs_count.section-metric-computing');
            $queue = "section-metric-computing-$queueId";

            $batch = Bus::batch($jobs)
                ->then(function (Batch $batch) use ($document) {
                    $this->saveSectionResult($document);
                    $this->afterAllSectionProcessing($document);
                })
                ->allowFailures()
                ->onQueue($queue)
                ->dispatch();
        }

        return $results;
    }
}
