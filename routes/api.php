<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\ConfiguracoesUsuarioController;
use App\Http\Controllers\ExportacaoDadosController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Perfil do usuário
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return response()->json($request->user());
});


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}/sessions', [UserController::class, 'showSessions']);
    Route::post('/', [UserController::class, 'store']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::post('/login', [UserController::class, 'login']);
});


Route::middleware('auth:sanctum')->prefix('contas')->group(function () {
    Route::get('/', [ContaController::class, 'index']);
    Route::post('/', [ContaController::class, 'store']);
    Route::get('/{id}', [ContaController::class, 'show']);
    Route::put('/{id}', [ContaController::class, 'update']);
    Route::delete('/{id}', [ContaController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('metas')->group(function () {
    Route::get('/', [MetaController::class, 'index']);
    Route::post('/', [MetaController::class, 'store']);
    Route::get('/{id}', [MetaController::class, 'show']);
    Route::put('/{id}', [MetaController::class, 'update']);
    Route::delete('/{id}', [MetaController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index']);
    Route::post('/', [CategoriaController::class, 'store']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('despesas')->group(function () {
    Route::get('/', [DespesaController::class, 'index']);
    Route::post('/', [DespesaController::class, 'store']);
    Route::get('/{id}', [DespesaController::class, 'show']);
    Route::put('/{id}', [DespesaController::class, 'update']);
    Route::delete('/{id}', [DespesaController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('receitas')->group(function () {
    Route::get('/', [ReceitaController::class, 'index']);
    Route::post('/', [ReceitaController::class, 'store']);
    Route::get('/{id}', [ReceitaController::class, 'show']);
    Route::put('/{id}', [ReceitaController::class, 'update']);
    Route::delete('/{id}', [ReceitaController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('orcamentos')->group(function () {
    Route::get('/', [OrcamentoController::class, 'index']);
    Route::post('/', [OrcamentoController::class, 'store']);
    Route::get('/{id}', [OrcamentoController::class, 'show']);
    Route::put('/{id}', [OrcamentoController::class, 'update']);
    Route::delete('/{id}', [OrcamentoController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('relatorios')->group(function () {
    Route::get('/', [RelatorioController::class, 'index']);
    Route::post('/', [RelatorioController::class, 'store']);
    Route::get('/{id}', [RelatorioController::class, 'show']);
    Route::put('/{id}', [RelatorioController::class, 'update']);
    Route::delete('/{id}', [RelatorioController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('configuracoes-usuarios')->group(function () {
    Route::get('/', [ConfiguracoesUsuarioController::class, 'index']);
    Route::post('/', [ConfiguracoesUsuarioController::class, 'store']);
    Route::get('/{id}', [ConfiguracoesUsuarioController::class, 'show']);
    Route::put('/{id}', [ConfiguracoesUsuarioController::class, 'update']);
    Route::delete('/{id}', [ConfiguracoesUsuarioController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('exportacao-dados')->group(function () {
    Route::get('/', [ExportacaoDadosController::class, 'index']);
    Route::post('/', [ExportacaoDadosController::class, 'store']);
    Route::get('/{id}', [ExportacaoDadosController::class, 'show']);
    Route::put('/{id}', [ExportacaoDadosController::class, 'update']);
    Route::delete('/{id}', [ExportacaoDadosController::class, 'destroy']);
});