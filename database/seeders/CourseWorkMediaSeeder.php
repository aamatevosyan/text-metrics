<?php

namespace Database\Seeders;

use App\Models\CourseWork;

class CourseWorkMediaSeeder extends BaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function run(): void
    {
        $basePath = "storage/courseworks/media";
        $data = self::getJson("{$basePath}/data.json");

        collect($data)->each(function (array $row) use ($basePath) {
            $courseWork = CourseWork::find($row['id']);

            collect($row['media'])
                ->each(function (string $filename) use ($courseWork, $basePath) {
                    $filePath = database_path("{$basePath}/{$filename}");

                    $hash = hash_file('sha256', $filePath);

                    if ($courseWork->media()->whereJsonContains('custom_properties->hash', $hash)->first()) {
                        return;
                    }

                    $courseWork
                        ->addMedia($filePath)
                        ->withCustomProperties(compact('hash')) //middle method
                        ->preservingOriginal() //middle method
                        ->toMediaCollection('documents'); //finishing method
                });
        });
    }
}
