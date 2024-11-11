<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\ReceitaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);               
    Route::get('/{id}/sessions', [UserController::class, 'showSessions']);
    Route::post('/', [UserController::class, 'store']);              
    Route::delete('/{id}', [UserController::class, 'destroy']);     
});


Route::prefix('contas')->group(function () {
    Route::get('/', [ContaController::class, 'index']);         
    Route::post('/', [ContaController::class, 'store']);        
    Route::get('/{id}', [ContaController::class, 'show']);     
    Route::put('/{id}', [ContaController::class, 'update']);   
    Route::delete('/{id}', [ContaController::class, 'destroy']);
});


Route::prefix('metas')->group(function () {
    Route::get('/', [MetaController::class, 'index']);       
    Route::post('/', [MetaController::class, 'store']);      
    Route::get('/{id}', [MetaController::class, 'show']);    
    Route::put('/{id}', [MetaController::class, 'update']);  
    Route::delete('/{id}', [MetaController::class, 'destroy']); 
});


Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index']);
    Route::post('/', [CategoriaController::class, 'store']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});


Route::prefix('despesas')->group(function () {
    Route::get('/', [DespesaController::class, 'index']);
    Route::post('/', [DespesaController::class, 'store']);
    Route::get('/{id}', [DespesaController::class, 'show']);
    Route::put('/{id}', [DespesaController::class, 'update']);
    Route::delete('/{id}', [DespesaController::class, 'destroy']);
});


Route::prefix('receitas')->group(function () {
    Route::get('/', [ReceitaController::class, 'index']);
    Route::post('/', [ReceitaController::class, 'store']);
    Route::get('/{id}', [ReceitaController::class, 'show']);
    Route::put('/{id}', [ReceitaController::class, 'update']);
    Route::delete('/{id}', [ReceitaController::class, 'destroy']);
});

