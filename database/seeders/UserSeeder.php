<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;

class UserSeeder extends ModelSeeder
{

    public function getModelClass(): string
    {
        return User::class;
    }

    public function prepareData(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return parent::prepareData($data);
    }
}
