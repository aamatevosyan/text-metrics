<?php

namespace Database\Seeders\Metrics;

use Domain\Metrics\Models\TextMetric;

class TextMetricSeeder extends BaseMetricsSeeder
{
    public function getModelClass(): string
    {
        return TextMetric::class;
    }
}
