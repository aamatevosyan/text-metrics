<?php

use App\Enums\DocumentProcessingRuleStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentProcessingRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_processing_rules', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->unsignedTinyInteger('course_work_type')
                ->nullable()
                ->index();
            $table->foreignId('branch_id')
                ->index()
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('document_processor_id')
                ->index()
                ->constrained();
            $table->unsignedTinyInteger('status')
                ->index()
                ->default(DocumentProcessingRuleStatus::Active->value);
            $table->jsonb('config')->nullable();
            $table->timestamps();

            $table->index('config', null, 'gin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_processing_rules');
    }
}
