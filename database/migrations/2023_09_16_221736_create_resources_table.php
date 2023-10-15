<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    public function up()
{
    Schema::create('resources', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('tipo'); // Puedes usar 'video', 'pdf', 'texto', etc.
        $table->string('url'); // La URL o ruta del recurso
        $table->unsignedBigInteger('module_id'); // Clave foránea para la relación con módulos
        $table->timestamps();
    });

    // Definir la relación con la tabla 'modules'
    Schema::table('resources', function (Blueprint $table) {
        $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
