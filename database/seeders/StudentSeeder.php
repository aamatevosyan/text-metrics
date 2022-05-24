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
}
