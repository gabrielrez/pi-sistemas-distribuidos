<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTable extends Migration
{
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id('id_relatorio');
            $table->foreignId('id_users')->constrained('users');
            $table->enum('tipo_relatorio', ['Despesas', 'Receitas', 'Orçamento', 'Geral']);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->text('conteudo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relatorios');
    }
}
