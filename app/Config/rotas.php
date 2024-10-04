<?php
$rotas = \Hefestos\Rotas\Roteador::instancia();
/* ----------------------------------------------------------------------
Cada rota deve ser respondida com o retorno de uma função, seja ela uma
função anonima ou um metodo de controller. Consulte a documentação.
---------------------------------------------------------------------- */

use App\Controllers\UsuarioController;
use App\Controllers\ReceitaController;
use App\Controllers\DespesaController;
use App\Controllers\MetaController;
use App\Controllers\HistoricoController;

$rotas->get('/', function () {
    $usuario = [
        'nome' => 'Dominic Deccoco',
        'email' => 'dominic@gmail.com',
    ];
    $total = '48200';
    $receitas = ['receita 1', 'receita 2'];
    $despesas = ['despesa 1'];
    return view('dashboard', [
        'usuario' => $usuario,
        'total' => $total,
        'receitas' => $receitas,
        'despesas' => $despesas
    ]);
});

$rotas->get('/cadastro', function () {
    return view('auth/cadastro');
});

$rotas->get('/login', function () {
    return view('auth/login');
});

$rotas->post('/usuarios', [UsuarioController::class, 'store']); // Criar usuário (conta)
$rotas->delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); // Deletar usuário (conta)

$rotas->get('/receitas', [ReceitaController::class, 'index']); // Listar receitas
$rotas->get('/receitas/novo', [ReceitaController::class, 'create']); // Formulário de nova receita
$rotas->post('/receitas', [ReceitaController::class, 'store']); // Criar nova receita

$rotas->get('/despesas', [DespesaController::class, 'index']); // Listar despesas
$rotas->get('/despesas/novo', [DespesaController::class, 'create']); // Formulário de nova despesa
$rotas->post('/despesas', [DespesaController::class, 'store']); // Criar nova despesa

$rotas->get('/metas', [MetaController::class, 'index']); // Listar metas
$rotas->get('/metas/novo', [MetaController::class, 'create']); // Formulário de nova meta
$rotas->post('/metas', [MetaController::class, 'store']); // Criar nova meta

$rotas->get('/historico', [HistoricoController::class, 'index']); // Ver histórico completo
