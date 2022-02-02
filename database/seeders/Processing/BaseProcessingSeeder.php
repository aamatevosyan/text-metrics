<?php

namespace Database\Seeders\Processing;

use Database\Seeders\ModelSeeder;

abstract class BaseProcessingSeeder extends ModelSeeder
{
    public function getJsonFileName(): string
    {
        return 'Processing/' . parent::getJsonFileName();
    }
}
