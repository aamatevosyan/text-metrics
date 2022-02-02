<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use JsonException;

class BaseSeeder extends Seeder
{
    protected static function getDataJson(string $filename): array
    {
        return self::getJson("data/$filename.json");
    }

    protected static function getJson(string $filename): array
    {
        try {
            return json_decode(file_get_contents(database_path($filename)), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {
            return [];
        }
    }
}
