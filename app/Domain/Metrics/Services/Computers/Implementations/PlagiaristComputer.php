<?php

namespace Domain\Metrics\Services\Computers\Implementations;

use Domain\DocumentProcessing\Services\Document\DocumentElement;
use Domain\Metrics\Services\Computers\Core\AbstractDocumentElementComputer;

class PlagiaristComputer extends AbstractDocumentElementComputer
{
    public function processElement(DocumentElement $element): ?array
    {
        $plagiat_percentage = random_int(100, 8000) / 100;

        return compact('plagiat_percentage');
    }

    public function isProcessingRootElement(): bool
    {
        return false;
    }

    public function isProcessingSections(): bool
    {
        return true;
    }

    public function isReducingSectionResults(): bool
    {
        return true;
    }
}
