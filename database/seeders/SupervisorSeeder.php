<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Hash;

class SupervisorSeeder extends ModelSeeder
{
    public function getModelClass(): string
    {
        return Supervisor::class;
    }

    public function prepareData(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return parent::prepareData($data);
    }
}
