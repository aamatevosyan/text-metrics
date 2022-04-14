<?php

namespace Domain\DocumentProcessing\Listeners;

use App\Jobs\ApplyDocumentProcessingJob;
use Log;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;

class MediaLogger
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MediaHasBeenAdded  $event
     * @return void
     */
    public function handle(MediaHasBeenAdded $event): void
    {
        $media = $event->media;
        $path = $media->getPath();

        Log::info("file {$path} has been saved for media {$media->id}");

        ApplyDocumentProcessingJob::dispatch($media)->onQueue('document-processing');
    }
}
