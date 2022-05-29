<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;

class SupervisorSeeder extends ModelSeeder
{
    public function getModelClass(): string
    {
        return Supervisor::class;
    }

    public function afterUpdateOrCreate(array $data, Model $model): void
    {
        /** @var Supervisor $model */
        $model->assign('supervisor');
    }
}
