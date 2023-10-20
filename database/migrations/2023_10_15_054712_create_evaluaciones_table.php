<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->text('pregunta'); // Cambia el tipo de columna a 'text'
            $table->text('opciones'); // Cambia el tipo de columna a 'text'
            $table->text('respuestas'); // Cambia el tipo de columna a 'text'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
}
