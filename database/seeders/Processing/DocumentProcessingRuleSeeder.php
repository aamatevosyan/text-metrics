<?php

namespace Database\Seeders\Processing;

use Domain\DocumentProcessing\Models\DocumentProcessingRule;

class DocumentProcessingRuleSeeder extends BaseProcessingSeeder
{
    public function getModelClass(): string
    {
        return DocumentProcessingRule::class;
    }
}
