<?php

namespace Domain\Metrics\Services\Computers\Implementations;


use Domain\DocumentProcessing\Services\Document\DocumentElement;
use Domain\Metrics\Services\Computers\Core\AbstractDocumentElementComputer;
use Illuminate\Support\Collection;
use Str;

class TimesNewRomanFontChecker extends AbstractDocumentElementComputer
{
    public function processElement(DocumentElement $element): ?array
    {
        $combined = $element->font?->alt_family_name.' '.$element->font?->family_name.' '.
            $element->font?->name;

        $times_new_roman = Str::contains($combined, ['Titlingmes New Roman', 'TimesNewRoman', 'Times New Roman']) ? 1
            : 0;

        return compact('times_new_roman');
    }

    public function reduceSectionResults(string $slug, Collection $results): mixed
    {
        return !$results->contains(0);
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
