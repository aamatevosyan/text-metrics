<?php

namespace Database\Seeders;

use App\Models\Branch;

class BranchSeeder extends ModelSeeder
{
    public function getModelClass(): string
    {
        return Branch::class;
    }

    public function afterSeed(): void
    {
        Branch::fixTree();
    }
}
