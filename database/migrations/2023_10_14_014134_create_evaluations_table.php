<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id(); // ID único de la evaluación
            $table->string('nombre'); // Nombre de la evaluación
            $table->text('descripcion')->nullable(); // Descripción de la evaluación (opcional)
            $table->string('enlace')->nullable(); // Enlace a la evaluación (opcional)
            $table->unsignedBigInteger('course_id'); // Clave foránea para relacionar con un curso
            $table->foreign('course_id')->references('id')->on('courses'); // Relación con el modelo Course
            $table->timestamps(); // Campos de registro de fecha y hora
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
