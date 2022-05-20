<?php

namespace Database\Seeders\Processing;

use Domain\DocumentProcessing\Models\DocumentProcessor;

class DocumentProcessorSeeder extends BaseProcessingSeeder
{
    public function getModelClass(): string
    {
        return DocumentProcessor::class;
    }
}
