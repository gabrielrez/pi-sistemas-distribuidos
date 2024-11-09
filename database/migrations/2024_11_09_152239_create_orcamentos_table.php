<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id('id_orcamento');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_categoria');
            $table->decimal('valor_planejado', 10, 2);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->timestamps();

            
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
}
