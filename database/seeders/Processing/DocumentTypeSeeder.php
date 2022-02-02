<?php

namespace Database\Seeders\Processing;

use Domain\DocumentProcessing\Models\DocumentType;

class DocumentTypeSeeder extends BaseProcessingSeeder
{
    public function getModelClass(): string
    {
        return DocumentType::class;
    }
}
