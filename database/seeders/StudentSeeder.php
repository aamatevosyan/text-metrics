<?php

namespace Database\Seeders;

use App\Models\Student;
use Hash;
use Illuminate\Database\Eloquent\Model;

class StudentSeeder extends ModelSeeder
{
    public function getModelClass(): string
    {
        return Student::class;
    }

    public function afterUpdateOrCreate(array $data, Model $model): void
    {
        /** @var Student $model */

        $model->assign('student');
    }
}
