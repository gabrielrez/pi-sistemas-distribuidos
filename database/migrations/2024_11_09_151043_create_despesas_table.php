<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespesasTable extends Migration
{
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id('id_despesa');
            $table->unsignedBigInteger('id_conta');
            $table->unsignedBigInteger('id_categoria');
            $table->decimal('valor', 10, 2);
            $table->dateTime('data');
            $table->string('descricao')->nullable();
            $table->timestamps();

            
            $table->foreign('id_conta')->references('id_conta')->on('contas');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
        });
    }

    public function down()
    {
        Schema::dropIfExists('despesas');
    }
}
