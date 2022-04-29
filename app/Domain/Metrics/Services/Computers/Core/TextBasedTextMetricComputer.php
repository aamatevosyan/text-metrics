<?php

namespace Domain\Metrics\Services\Computers\Core;

use App\Models\Document;
use Bus;
use Cache;
use Domain\Metrics\Jobs\ApplySectionTextMetricComputingJob;
use Domain\Metrics\Models\DocumentMetricResult;
use Illuminate\Bus\Batch;

abstract class TextBasedTextMetricComputer extends AbstractTextMetricComputer
{
    public function getType(): TextMetricComputerType
    {
        return TextMetricComputerType::TEXT_BASED;
    }

    abstract public function isProcessingParagraphs(): bool;

    abstract public function process(string $inputText): array;

    public function compute(Document $document): TextMetricComputerResult
    {
        $results = $this->process(
            $document->getParagraphsText()
        );

        if ($this->isProcessingParagraphs()) {
            $jobs = collect($document->getParagraphs())->map(
                fn(string $text, string $uuid) => new ApplySectionTextMetricComputingJob(
                    $this,
                    $uuid,
                    $text,
                    $document->documentMetricResult->id,
                )
            );

            $batch = Bus::batch($jobs)
                ->then(function (Batch $batch) use ($document) {
                    $cacheKey = DocumentMetricResult::getCacheKey('section_results.'.$document->documentMetricResult->id);
                    $section_results = Cache::get($cacheKey);
                    $document->documentMetricResult()->update(compact('section_results'));

                    Cache::forget($cacheKey);
                })
                ->allowFailures()
                ->onQueue('section-metric-computing')
                ->dispatch();
        }

        return TextMetricComputerResult::fromData(compact('results'));
    }
}
