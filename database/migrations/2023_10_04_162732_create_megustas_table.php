<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMegustasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('megustas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mensaje_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
    
            $table->foreign('mensaje_id')->references('id')->on('mensajes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('megustas');
    }
}
