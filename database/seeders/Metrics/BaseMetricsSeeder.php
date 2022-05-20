<?php

namespace Database\Seeders\Metrics;

use Database\Seeders\ModelSeeder;

abstract class BaseMetricsSeeder extends ModelSeeder
{
    public function getJsonFileName(): string
    {
        return 'Metrics/' . parent::getJsonFileName();
    }
}
