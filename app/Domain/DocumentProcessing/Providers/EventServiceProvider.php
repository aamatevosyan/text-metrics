<?php

namespace Domain\DocumentProcessing\Providers;

use Domain\DocumentProcessing\Listeners\MediaLogger;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        MediaHasBeenAdded::class => [
            MediaLogger::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }
}
