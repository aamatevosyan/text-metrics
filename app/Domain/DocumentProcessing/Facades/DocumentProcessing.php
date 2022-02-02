<?php

namespace Domain\DocumentProcessing\Facades;

use Illuminate\Support\Facades\Facade;

class DocumentProcessing extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'document-processing';
    }
}
