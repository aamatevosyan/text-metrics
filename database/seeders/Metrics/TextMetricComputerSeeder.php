<?php

namespace Database\Seeders\Metrics;

use Domain\Metrics\Models\TextMetricComputer;

class TextMetricComputerSeeder extends BaseMetricsSeeder
{
    public function getModelClass(): string
    {
        return TextMetricComputer::class;
    }
}
