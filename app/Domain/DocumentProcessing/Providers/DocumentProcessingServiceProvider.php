<?php

namespace Domain\DocumentProcessing\Providers;

use Domain\DocumentProcessing\Services\DocumentProcessingService;
use Illuminate\Support\ServiceProvider;

class DocumentProcessingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerContainerBindings();

        $this->app->register(EventServiceProvider::class);
    }

    protected function registerContainerBindings(): void
    {
        $this->app->singleton('document-processing', DocumentProcessingService::class);
    }
}
