<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->text('descricao');
            $table->integer('parcelas');
            $table->boolean('fixo');
            $table->integer('tipo'); // 1 - Categoria // 2 - Conta
            $table->date('dt_vencimento');
            $table->integer('qtd_pagos')->default(0);
            $table->float('valor');
            $table->uuid('conta_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
