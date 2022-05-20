<?php

namespace Domain\Metrics\Jobs;

use Cache;
use Domain\DocumentProcessing\Services\Document\DocumentElement;
use Domain\Metrics\Models\DocumentMetricResult;
use Domain\Metrics\Services\Computers\Core\AbstractDocumentElementComputer;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ApplySectionTextMetricComputingJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected AbstractDocumentElementComputer $computer,
        protected DocumentElement $documentElement,
        protected int $documentMetricResultId,
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cacheKey = DocumentMetricResult::getCacheKey(
            'section_results.'.$this->documentMetricResultId.'.'.$this->computer->getModel()->id.'.'
            .$this->documentElement->uuid,
        );

        $computed = $this->computer->process($this->documentElement);

        if ($computed) {
            Cache::forever($cacheKey, $computed);
        }

        $jobs = $this->documentElement->children->toCollection()->map(
            fn(DocumentElement $element) => new self(
                $this->computer,
                $element,
                $this->documentMetricResultId,
            )
        );

        $this->batch()
            ->add($jobs);
    }
}
