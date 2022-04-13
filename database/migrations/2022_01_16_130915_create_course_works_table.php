<?php

use App\Enums\CourseWorkType;
use App\Enums\DocumentTypeStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_works', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('student_id')
                ->index()
                ->constrained();
            $table->foreignId('supervisor_id')
                ->index()
                ->constrained();
            $table->unsignedTinyInteger('type')
                ->default(CourseWorkType::CourseWork->value)
                ->index();
            $table->unsignedTinyInteger('status')
                ->default(DocumentTypeStatus::Active->value)
                ->index();
            $table->jsonb('name');
            $table->softDeletes();
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
        Schema::dropIfExists('course_works');
    }
}
