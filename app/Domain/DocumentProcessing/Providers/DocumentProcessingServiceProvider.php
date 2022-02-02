<?php

namespace Domain\DocumentProcessing\Providers;

use Domain\DocumentProcessing\Services\DocumentProcessingService;
use Illuminate\Support\ServiceProvider;

class DocumentProcessingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    protected function registerContainerBindings(): void
    {
        $this->app->singleton('document-processing', DocumentProcessingService::class);
    }
}
