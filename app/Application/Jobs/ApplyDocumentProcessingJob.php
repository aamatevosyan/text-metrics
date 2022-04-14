<?php

namespace App\Jobs;

use Domain\DocumentProcessing\Facades\DocumentProcessing;
use Domain\DocumentProcessing\Processors\AbstractDocumentProcessor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ApplyDocumentProcessingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected Media $media)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DocumentProcessing::process($this->media);
    }
}
