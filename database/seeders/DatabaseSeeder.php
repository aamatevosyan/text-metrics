<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(BranchTypeSeeder::class);
        $this->call(BranchSeeder::class);

        $this->call(StudentSeeder::class);
        $this->call(SupervisorSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(CourseWorkSeeder::class);
    }
}
