<?php

namespace Database\Seeders;

use App\Models\Admin;
use Hash;

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
}
