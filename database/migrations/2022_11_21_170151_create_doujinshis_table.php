<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoujinshisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doujinshis', function (Blueprint $table) {
            $table->id();
            $table->string('name_doujinshi')->unique();
            $table->string('outher_name');
            $table->string('author');
            $table->string('publish_date');
            $table->integer('views');
            $table->integer('chapter');
            $table->string('sinopse');
            $table->string('path_file');
            $table->string("code")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doujinshis');
    }
}
