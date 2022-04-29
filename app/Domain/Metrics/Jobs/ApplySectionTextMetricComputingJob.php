<?php

namespace Domain\Metrics\Jobs;

use Cache;
use DB;
use Domain\Metrics\Models\DocumentMetricResult;
use Domain\Metrics\Services\Computers\Core\TextBasedTextMetricComputer;
use Domain\Metrics\Services\Computers\Core\TextMetricComputerResult;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
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
        protected TextBasedTextMetricComputer $computer,
        protected string $uuid,
        protected string $text,
        protected int $documentMetricResultId,
    ) {
        //
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array
     */
    public function middleware()
    {
        return [(new WithoutOverlapping($this->documentMetricResultId))->releaseAfter(60)->expireAfter(180)];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cacheKey = DocumentMetricResult::getCacheKey('section_results.'.$this->documentMetricResultId);
        $section_results = Cache::get($cacheKey, []);

        $origin = TextMetricComputerResult::fromData(compact('section_results'));
        $textMetricResults = $this->computer->process($this->text);

        $origin->addSectionResults($this->uuid, $textMetricResults);

        Cache::forever($cacheKey, $origin->getSectionResults());
    }
}
