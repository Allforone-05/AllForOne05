<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStarsToCourses extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('stars')->default(0); // Agrega un campo 'stars' de tipo entero con valor predeterminado 0
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('stars'); // Elimina el campo 'stars' si se revierte la migración
        });
    }
}
