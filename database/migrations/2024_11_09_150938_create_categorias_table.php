<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nome');
            $table->enum('tipo', ['Despesa', 'Receita']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
