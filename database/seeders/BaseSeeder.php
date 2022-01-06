<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use JsonException;

class BaseSeeder extends Seeder
{
    protected static function getJson($filename): array
    {
        try {
            return json_decode(file_get_contents(database_path("data/$filename.json")), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
            return [];
        }
    }
}
