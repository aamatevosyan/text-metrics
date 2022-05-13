<?php

namespace Domain\Metrics\Services;

use App\Models\Document;
use Bus;
use Domain\Metrics\Jobs\ApplyTextMetricComputingJob;
use Domain\Metrics\Models\DocumentMetricResult;
use Domain\Metrics\Models\MonitoredMetricResult;
use Domain\Metrics\Models\TextMetricComputer;
use Illuminate\Bus\Batch;

class MetricComputingService
{
    public function process(Document $document): ?string
    {
        $textMetricComputers = TextMetricComputer::query()
            ->with('textMetrics')
            ->get();

        if ($textMetricComputers->isEmpty()) {
            return null;
        }

        /** @var MonitoredMetricResult $monitoredMetricResult */
        $monitoredMetricResult = $document->monitoredMetricResult()
            ->firstOrCreate(
                $document->only('course_work_id'),
                $document->only('course_work_id')
            );

        /** @var DocumentMetricResult $documentMetricResult */
        $documentMetricResult = $document->documentMetricResult()
            ->firstOrCreate(
                $document->only('document_id', 'course_work_id'),
                $document->only('document_id', 'course_work_id')
            );

        $jobs = $textMetricComputers->map(
            fn(TextMetricComputer $textMetricComputer) => new ApplyTextMetricComputingJob(
                $textMetricComputer,
                $document,
                $documentMetricResult
            )
        );

        $queueId = $documentMetricResult->id % config('queue.parallel_jobs_count.metric-computing');
        $queue = "metric-computing-$queueId";

        $batch = Bus::batch($jobs)
            ->then(function (Batch $batch) use ($documentMetricResult, $monitoredMetricResult) {
                $documentMetricResult->refresh();
                $monitoredMetricResult->update([
                    'document_id' => $documentMetricResult->id,
                    'results' => $documentMetricResult->results,
                ]);
            })
            ->onQueue($queue)
            ->allowFailures()
            ->dispatch();

        return $batch->id;
    }
}
