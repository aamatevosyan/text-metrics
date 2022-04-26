<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentMetricResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('document_metric_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_work_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('document_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->jsonb('results')->nullable();
            $table->jsonb('detailed_results')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('document_metric_results');
    }
}
