<?php

namespace Database\Seeders;

use App\Models\Admin;
use Hash;
use Illuminate\Database\Eloquent\Model;

class AdminSeeder extends ModelSeeder
{

    public function getModelClass(): string
    {
        return Admin::class;
    }

    public function prepareData(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return parent::prepareData($data);
    }

    /**
     * @param  array  $data
     * @param  Admin  $model
     * @return void
     */
    public function afterUpdateOrCreate(array $data, Model $model): void
    {
        if (isset($data['role'])) {
            $model->assign($data['role']);
        }
    }
}
