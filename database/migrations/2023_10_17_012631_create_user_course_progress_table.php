<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCourseProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/YYYY_MM_DD_create_user_course_progress_table.php

public function up()
{
    Schema::create('user_course_progress', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('course_id');
        $table->unsignedBigInteger('lesson_id');
        $table->boolean('completed')->default(false);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('course_id')->references('id')->on('courses');
        $table->foreign('lesson_id')->references('id')->on('lessons');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_course_progress');
    }
}
