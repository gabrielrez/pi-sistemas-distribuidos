<?php
/* ----------------------------------------------------------------------
Cada rota deve ser respondida com o retorno de uma função, seja ela uma
função anonima ou um metodo de controller. Consulte a documentação.
---------------------------------------------------------------------- */

use Hefestos\Rotas\Rota;
use App\Controllers\UsuarioController;
use App\Controllers\DashboardController;
use App\Controllers\ReceitaController;
use App\Controllers\DespesaController;
use App\Controllers\MetaController;

Rota::get('/', function () {
    return view('landing_page');
});

Rota::get('/cadastro', function () {
    if ($_SESSION) {
        sessao()->destruir();
    }
    return view('auth/cadastro');
});

Rota::get('/login', function () {
    if ($_SESSION) {
        sessao()->destruir();
    }
    return view('auth/login');
});

Rota::get('/dashboard', [DashboardController::class, 'index'])->filtro('logado'); // Dashboard

Rota::post('/cadastro', [UsuarioController::class, 'cadastro']); // Criar usuário
Rota::post('/login', [UsuarioController::class, 'login']); // Login usuário
Rota::get('/logout', [UsuarioController::class, 'logout']); // Logout usuário
Rota::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); // Deletar usuário

Rota::get('/receitas', [ReceitaController::class, 'index']); // Listar receitas
Rota::get('/receitas/novo', [ReceitaController::class, 'create']); // Formulário de nova receita
Rota::post('/receitas', [ReceitaController::class, 'store']); // Criar nova receita

Rota::get('/despesas', [DespesaController::class, 'index']); // Listar despesas
Rota::get('/despesas/novo', [DespesaController::class, 'create']); // Formulário de nova despesa
Rota::post('/despesas', [DespesaController::class, 'store']); // Criar nova despesa

Rota::get('/metas', [MetaController::class, 'index']); // Listar metas
Rota::get('/metas/novo', [MetaController::class, 'create']); // Formulário de nova meta
Rota::post('/metas', [MetaController::class, 'store']); // Criar nova meta
