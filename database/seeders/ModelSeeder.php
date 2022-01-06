<?php

namespace Database\Seeders;

use Arr;
use DB;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

abstract class ModelSeeder extends BaseSeeder
{
    /**
     * @return string
     */
    abstract public function getModelClass(): string;

    /**
     * @return Model
     */
    public function getModelClassInstance(): Model
    {
        $modelClass = $this->getModelClass();

        return with(new $modelClass);
    }

    /**
     * @return string
     */
    public function getJsonFileName(): string
    {
        return $this->getModelClassInstance()->getTable();
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $fileName = $this->getJsonFileName();

        return array_map(fn($data) => $this->prepareData($data), static::getJson($fileName));
    }

    /**
     * @return array
     */
    public function getDistinctKeys(): array
    {
        return ['id'];
    }

    /**
     * @return bool
     */
    public function withoutTimestamps(): bool
    {
        return true;
    }

    /**
     * @param  array  $data
     * @return array
     */
    public function prepareData(array $data): array
    {
        if ($this->withoutTimestamps()) {
            return Arr::except($data, ['created_at', 'updated_at']);
        }

        return $data;
    }

    /**
     * @param  array  $data
     * @param  array  $keys
     * @return array
     */
    #[Pure] public function getDistinctData(array $data, array $keys): array
    {
        return Arr::only($data, $keys);
    }

    /**
     * @param  array  $data
     * @return Model
     */
    public function updateOrCreate(array $data): Model
    {
        $keys = $this->getDistinctKeys();
        $modelClass = $this->getModelClass();

        if ($keys && $distinctData = $this->getDistinctData($data, $keys)) {
            return $modelClass::updateOrCreate(
                $distinctData,
                $data
            );
        }

        return $modelClass::create($data);
    }

    public function afterSeed(): void
    {

    }

    public function beforeSeed(): void
    {

    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->beforeSeed();

        DB::transaction(
            fn() => collect($this->getData())
                ->each(fn(array $data) => $this->updateOrCreate($data))
        );

        $this->afterSeed();
    }
}
