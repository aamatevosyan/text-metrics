<?php

namespace Database\Seeders;

use App\Models\Student;
use Hash;

class StudentSeeder extends ModelSeeder
{
    public function getModelClass(): string
    {
        return Student::class;
    }

    public function prepareData(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return parent::prepareData($data);
    }
}
