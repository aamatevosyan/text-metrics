<?php

namespace Database\Seeders;

use Database\Seeders\Processing\DocumentProcessingRuleSeeder;
use Database\Seeders\Processing\DocumentProcessorSeeder;
use Database\Seeders\Processing\DocumentProcessorDocumentTypeSeeder;
use Database\Seeders\Processing\DocumentTypeSeeder;
use Domain\DocumentProcessing\Models\DocumentProcessor;
use Domain\DocumentProcessing\Models\DocumentProcessorDocumentType;
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

        $this->call(DocumentTypeSeeder::class);
        $this->call(DocumentProcessorSeeder::class);
        $this->call(DocumentProcessorDocumentTypeSeeder::class);
        $this->call(DocumentProcessingRuleSeeder::class);

        $this->call(CourseWorkSeeder::class);
        $this->call(CourseWorkMediaSeeder::class);
    }
}
