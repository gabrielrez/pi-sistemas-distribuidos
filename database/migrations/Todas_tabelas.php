<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

class CreateContasTable extends Migration
{
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id('id_conta');
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->decimal('saldo_inicial', 10, 2);
            $table->decimal('saldo_atual', 10, 2);
            $table->string('tipo_conta', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contas');
    }
}

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

class CreateDespesasTable extends Migration
{
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id('id_despesa');
            $table->foreignId('id_conta')->constrained('contas');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->decimal('valor', 10, 2);
            $table->dateTime('data');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('despesas');
    }
}

class CreateReceitasTable extends Migration
{
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id('id_receita');
            $table->foreignId('id_conta')->constrained('contas');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->decimal('valor', 10, 2);
            $table->dateTime('data');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receitas');
    }
}

class CreateOrcamentosTable extends Migration
{
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id('id_orcamento');
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->decimal('valor_planejado', 10, 2);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
}

class CreateMetaFinanceirasTable extends Migration
{
    public function up()
    {
        Schema::create('meta_financeiras', function (Blueprint $table) {
            $table->id('id_meta');
            $table->foreignId('id_usuario')->constrained('usuarios');
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

class CreateRelatoriosTable extends Migration
{
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id('id_relatorio');
            $table->foreignId('id_usuario')->constrained('usuarios');
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

class CreateConfiguracoesUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('configuracoes_usuarios', function (Blueprint $table) {
            $table->id('id_configuracao');
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->json('preferencias')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracoes_usuarios');
    }
}

class CreateExportacaoDadosTable extends Migration
{
    public function up()
    {
        Schema::create('exportacao_dados', function (Blueprint $table) {
            $table->id('id_exportacao');
            $table->foreignId('id_usuario')->constrained('usuarios');
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
