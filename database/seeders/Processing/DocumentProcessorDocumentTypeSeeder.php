<?php

namespace Database\Seeders\Processing;

use Domain\DocumentProcessing\Models\DocumentProcessorDocumentType;

class DocumentProcessorDocumentTypeSeeder extends BaseProcessingSeeder
{
    public function getModelClass(): string
    {
        return DocumentProcessorDocumentType::class;
    }
}
