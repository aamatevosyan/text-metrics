<?php

namespace Domain\Metrics\Jobs;

use App\Models\Document;
use Domain\Metrics\Models\DocumentMetricResult;
use Domain\Metrics\Models\TextMetricComputer;
use Domain\Metrics\Services\Computers\Core\AbstractTextMetricComputer;
use Domain\Metrics\Services\Computers\Core\TextMetricComputerResult;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;

class ApplyTextMetricComputingJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected AbstractTextMetricComputer $computer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected TextMetricComputer $textMetricComputer,
        protected Document $document,
        protected DocumentMetricResult $documentMetricResult,
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->computer = AbstractTextMetricComputer::fromModel($this->textMetricComputer);

        $origin = $this->documentMetricResult->results;
        $computed = $this->computer->compute($this->document) ?? [];

        $calculated = array_merge($origin, $computed);

        if ($calculated) {
            $this->documentMetricResult->update(['results' => $calculated]);
        }
    }
}
