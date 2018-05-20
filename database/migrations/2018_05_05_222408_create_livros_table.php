<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->integer('id_autor')->unsigned();
            $table->foreign('id_autor')->references('id')->on('autores');
            $table->integer('id_editora')->unsigned();
            $table->foreign('id_editora')->references('id')->on('editoras');
            $table->integer('ano');
            $table->string('isbn', 20);
            $table->string('descricao', 500);
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
        Schema::dropIfExists('livros');
    }
}
