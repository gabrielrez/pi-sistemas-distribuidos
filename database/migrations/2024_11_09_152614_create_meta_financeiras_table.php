<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaFinanceirasTable extends Migration
{
    public function up()
    {
        Schema::create('meta_financeiras', function (Blueprint $table) {
            $table->bigIncrements('id_meta');
            $table->foreignId('id_users')->constrained('users');
            $table->string('descricao')->nullable();
            $table->decimal('valor_alvo', 10, 2);
            $table->dateTime('data_meta');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meta_financeiras');
    }
}
