<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\CategoriaController;

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
