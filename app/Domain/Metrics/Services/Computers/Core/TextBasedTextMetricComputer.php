<?php

namespace Domain\Metrics\Services\Computers\Core;

use Domain\DocumentProcessing\Services\Document\DocumentElement;

abstract class TextBasedTextMetricComputer extends AbstractDocumentElementComputer
{
    abstract public function processText(string $text): ?array;

    public function processElement(DocumentElement $element): ?array
    {
        return $this->processText($element->text);
    }

    public function processRootElement(DocumentElement $element): ?array
    {
        return $this->processText($element->getWholeText());
    }

    public function needsProcessing(DocumentElement $element): bool
    {
        return $element->text || $this->isProcessingRootElement();
    }
}
