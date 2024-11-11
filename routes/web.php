<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\MetaController;

Route::get('/', function () {
    return view('landing_page');
});

// Rotas de autenticação
Route::get('/cadastro', function () {
    if (session()->has('user')) {
        session()->flush(); // Limpa a sessão
    }
    return view('auth.cadastro');
});

Route::get('/login', function () {
    if (session()->has('user')) {
        session()->flush(); // Limpa a sessão
    }
    return view('auth.login');
});

Route::post('/cadastro', [UsuarioController::class, 'cadastro']); // Criar usuário
Route::post('/login', [UsuarioController::class, 'login']); // Login usuário
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout'); // Logout usuário
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); // Deletar usuário

// Rota protegida por middleware de autenticação
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Dashboard

    // Rotas de receitas
    Route::get('/receitas', [ReceitaController::class, 'index'])->name('receitas.index'); // Listar receitas
    Route::get('/receitas/novo', [ReceitaController::class, 'create'])->name('receitas.create'); // Formulário de nova receita
    Route::post('/receitas', [ReceitaController::class, 'store'])->name('receitas.store'); // Criar nova receita

    // Rotas de despesas
    Route::get('/despesas', [DespesaController::class, 'index'])->name('despesas.index'); // Listar despesas
    Route::get('/despesas/novo', [DespesaController::class, 'create'])->name('despesas.create'); // Formulário de nova despesa
    Route::post('/despesas', [DespesaController::class, 'store'])->name('despesas.store'); // Criar nova despesa

    // Rotas de metas
    Route::get('/metas', [MetaController::class, 'index'])->name('metas.index'); // Listar metas
    Route::get('/metas/novo', [MetaController::class, 'create'])->name('metas.create'); // Formulário de nova meta
    Route::post('/metas', [MetaController::class, 'store'])->name('metas.store'); // Criar nova meta
});