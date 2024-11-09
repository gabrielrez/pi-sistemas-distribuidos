<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Admin',
            'email' => 'admin@example.com',
            'senha' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['nome' => 'Alimentação', 'tipo' => 'Despesa'],
            ['nome' => 'Salário', 'tipo' => 'Receita'],
            ['nome' => 'Transporte', 'tipo' => 'Despesa'],
            ['nome' => 'Investimentos', 'tipo' => 'Receita'],
        ]);
    }
}

class ContasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contas')->insert([
            'id_usuario' => 1,
            'saldo_inicial' => 1000.00,
            'saldo_atual' => 1000.00,
            'tipo_conta' => 'Corrente',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class DespesasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('despesas')->insert([
            'id_conta' => 1,
            'id_categoria' => 1,
            'valor' => 50.00,
            'data' => now(),
            'descricao' => 'Compra de alimentos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class ReceitasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('receitas')->insert([
            'id_conta' => 1,
            'id_categoria' => 2,
            'valor' => 2000.00,
            'data' => now(),
            'descricao' => 'Salário mensal',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class OrcamentosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orcamentos')->insert([
            'id_usuario' => 1,
            'id_categoria' => 1,
            'valor_planejado' => 500.00,
            'data_inicio' => now(),
            'data_fim' => now()->addMonth(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class MetaFinanceirasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('meta_financeiras')->insert([
            'id_usuario' => 1,
            'descricao' => 'Economizar para viagem',
            'valor_alvo' => 3000.00,
            'data_meta' => now()->addYear(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class RelatoriosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('relatorios')->insert([
            'id_usuario' => 1,
            'tipo_relatorio' => 'Geral',
            'data_inicio' => now()->subMonth(),
            'data_fim' => now(),
            'conteudo' => 'Relatório geral do mês',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class ConfiguracoesUsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('configuracoes_usuarios')->insert([
            'id_usuario' => 1,
            'preferencias' => json_encode(['tema' => 'escuro']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

class ExportacaoDadosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('exportacao_dados')->insert([
            'id_usuario' => 1,
            'formato' => 'CSV',
            'data_exportacao' => now(),
            'conteudo' => 'Dados exportados em CSV',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
