<?php

namespace Domain\Metrics\Services\Computers\Implementations;

use Domain\Metrics\Services\Computers\Core\TextBasedTextMetricComputer;
use Http;

class RuTSComputer extends TextBasedTextMetricComputer
{
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

    public function processText(string $text): ?array
    {
        return Http::timeout(300)->post('http://ruts:8009', compact('text'))->json();
    }
}
