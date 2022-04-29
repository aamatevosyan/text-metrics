<?php

namespace Domain\Metrics\Services\Computers\Core;

use App\Models\Document;
use Domain\Metrics\Models\DocumentMetricResult;
use Domain\Metrics\Models\MonitoredMetricResult;
use Domain\Metrics\Models\TextMetricComputer;


abstract class AbstractTextMetricComputer
{
    abstract public function getType(): TextMetricComputerType;

    public static function fromModel(TextMetricComputer $model): static
    {
        return new $model->class($model->config);
    }

    abstract public function compute(Document $document): TextMetricComputerResult;
}
