<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id'); // Para la relación con el curso
            $table->string('titulo');
            $table->text('descripcion');
            $table->text('contenido');
            $table->integer('orden');
            $table->timestamps();
        });

        // Definir la relación con la tabla 'courses'
        Schema::table('modules', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
