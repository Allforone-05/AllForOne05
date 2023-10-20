<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosResumenesTable extends Migration
{
    public function up()
    {
        Schema::create('trabajos_resumenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relaciona el trabajo o resumen con un usuario
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('archivo_path'); // Para almacenar la ruta del archivo PDF o enlace de Google Drive
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajos_resumenes');
    }
}
