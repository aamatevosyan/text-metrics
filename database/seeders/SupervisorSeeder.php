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
}
