<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContentToForumPosts extends Migration
{
    public function up()
    {
        Schema::table('forum_posts', function (Blueprint $table) {
            $table->text('content'); // Agrega el campo 'content' de tipo texto
        });
    }

    public function down()
    {
        Schema::table('forum_posts', function (Blueprint $table) {
            $table->dropColumn('content'); // Elimina el campo 'content' si es necesario
        });
    }
}
