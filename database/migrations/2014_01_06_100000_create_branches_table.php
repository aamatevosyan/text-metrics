<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId(NestedSet::PARENT_ID)
                ->nullable()
                ->constrained('branches');

            $table->unsignedBigInteger(NestedSet::LFT)->default(0);
            $table->unsignedBigInteger(NestedSet::RGT)->default(0);

            $table->foreignId('branch_type_id')
                ->index()
                ->constrained('branch_types');
            $table->jsonb('name');
            $table->timestamps();

            $table->index([NestedSet::LFT, NestedSet::RGT, NestedSet::PARENT_ID]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
