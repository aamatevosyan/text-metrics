<?php

use App\Enums\DocumentProcessorStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentProcessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_processors', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name')->index();
            $table->string('class')->index();
            $table->unsignedTinyInteger('status')
                ->index()
                ->default(DocumentProcessorStatus::Active->value);
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
        Schema::dropIfExists('document_processors');
    }
}
