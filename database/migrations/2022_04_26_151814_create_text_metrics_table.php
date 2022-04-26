<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('text_metrics', function (Blueprint $table) {
            $table->id();
            $table->jsonb('name');
            $table->foreignId('text_metric_computer_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->jsonb('description')->nullable();
            $table->string('slug')->unique();
            $table->boolean('numeric')->default(false);
            $table->boolean('monitored')->default(false);
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
        Schema::dropIfExists('text_metrics');
    }
}
