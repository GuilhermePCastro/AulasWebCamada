<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecriaTbVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_venda', function (Blueprint $table) {
            $table->id();
            $table->date('dt_venda');
            $table->double('vl_venda',10,4);
            $table->biginteger('funcionario_id')->unsigned();
            $table->biginteger('cliente_id')->unsigned();

            $table->foreing('cliente_id')->references('id')->on('tb_cliente')->onDelete('cascade');
            $table->foreing('funcionario_id')->references('id')->on('tb_funcionario')->onDelete('cascade');
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
        Schema::dropIfExists('tb_vendas');
    }
}
