<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMensajePadreIdToMensajesTable extends Migration
{
    public function up()
{
    Schema::table('mensajes', function (Blueprint $table) {
        $table->unsignedBigInteger('padre_id')->nullable();
        $table->foreign('padre_id')->references('id')->on('mensajes');
    });
}


    public function down()
    {
        Schema::table('mensajes', function (Blueprint $table) {
            // Eliminar la columna 'mensaje_padre_id' si existe
            if (Schema::hasColumn('mensajes', 'mensaje_padre_id')) {
                $table->dropColumn('mensaje_padre_id');
            }
        });
    }
}
