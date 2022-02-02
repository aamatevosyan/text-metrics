<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentProcessorDocumentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_processor_document_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_processor_id')
                ->index()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('document_type_id')
                ->index()
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_processor_document_type');
    }
}
