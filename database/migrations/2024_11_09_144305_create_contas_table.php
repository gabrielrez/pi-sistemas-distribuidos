<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('contas')) {
            Schema::create('contas', function (Blueprint $table) {
                $table->id('id_conta');
                $table->foreignId('id_users')->constrained('users');
                $table->decimal('saldo_inicial', 10, 2);
                $table->decimal('saldo_atual', 10, 2);
                $table->string('tipo_conta', 50);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
