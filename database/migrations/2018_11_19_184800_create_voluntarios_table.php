<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome');
          $table->string('doc');
          $table->string('aluno');
          $table->string('rota');
          $table->string('foto');
          $table->string('residencia');
          $table->string('turno');
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
        Schema::dropIfExists('voluntarios');
    }
}
