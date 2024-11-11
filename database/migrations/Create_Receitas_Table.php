<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitasTable extends Migration
{
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id('id_receita');
            $table->foreignId('id_conta')->constrained('contas')->onDelete('cascade');
            $table->foreignId('id_categoria')->constrained('categorias')->onDelete('cascade');
            $table->decimal('valor', 10, 2);
            $table->dateTime('data');
            $table->string('descricao', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receitas');
    }
}
