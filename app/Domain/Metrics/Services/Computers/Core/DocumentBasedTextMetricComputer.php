<?php

namespace Domain\Metrics\Services\Computers\Core;

abstract class DocumentBasedTextMetricComputer extends AbstractTextMetricComputer
{
    public function getType(): TextMetricComputerType
    {
        return TextMetricComputerType::TEXT_BASED;
    }
}
