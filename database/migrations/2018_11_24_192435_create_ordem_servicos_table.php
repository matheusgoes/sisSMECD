<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('tonners_enviados');
            $table->string('tonners_recebidos');
            $table->string('tonners_entregues');
            $table->string('data_envio');
            $table->string('data_entrega');
            $table->string('obs');
            $table->string('qtd_enviado');
            $table->string('qtd_recebido');
            $table->string('qtd_entregue');
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
        Schema::dropIfExists('ordem_servicos');
    }
}
