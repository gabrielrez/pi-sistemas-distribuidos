<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracoesUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('configuracoes_usuarios', function (Blueprint $table) {
            $table->id('id_configuracao');
            $table->foreignId('id_users')->constrained('users');
            $table->json('preferencias')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracoes_usuarios');
    }
}
