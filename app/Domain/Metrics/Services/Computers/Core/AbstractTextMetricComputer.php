<?php

namespace Domain\Metrics\Services\Computers\Core;

use App\Models\Document;
use Domain\Metrics\Models\TextMetricComputer;


abstract class AbstractTextMetricComputer
{
    public function __construct(protected TextMetricComputer $model, protected array $slugs, array $config = [])
    {
    }


    public function getModel(): TextMetricComputer
    {
        return $this->model;
    }

    public static function fromModel(TextMetricComputer $model): static
    {
        $slugs = $model->textMetrics()->pluck('slug')->toArray();

        return new $model->class($model, $slugs, $model->config);
    }

    abstract public function compute(Document $document): ?array;
}
