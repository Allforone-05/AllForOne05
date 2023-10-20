<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id'); // Esta columna se usa para relacionar las lecciones con cursos
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->string('video_url')->nullable(); // Puede ser nulo si no todas las lecciones son videos
            // Otros campos que puedas necesitar
            $table->timestamps();

            // Definir la clave externa para la relación con la tabla de cursos (courses)
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
