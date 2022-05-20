<?php

namespace Database\Seeders;

use Bouncer;

class RoleSeeder extends ModelSeeder
{
    public function getModelClass(): string
    {
        return get_class(Bouncer::role());
    }
}
