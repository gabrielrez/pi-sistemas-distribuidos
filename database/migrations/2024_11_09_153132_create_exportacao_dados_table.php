<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportacaoDadosTable extends Migration
{
    public function up()
    {
        Schema::create('exportacao_dados', function (Blueprint $table) {
            $table->id('id_exportacao');
            $table->foreignId('id_users')->constrained('users');
            $table->enum('formato', ['CSV', 'PDF']);
            $table->dateTime('data_exportacao')->useCurrent();
            $table->text('conteudo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exportacao_dados');
    }
}
