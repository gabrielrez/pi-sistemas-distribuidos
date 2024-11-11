<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\MetaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);               
Route::get('/users/{id}/sessions', [UserController::class, 'showSessions']);
Route::post('/users', [UserController::class, 'store']);              
Route::delete('/users/{id}', [UserController::class, 'destroy']);     

Route::get('contas', [ContaController::class, 'index']);         
Route::post('contas', [ContaController::class, 'store']);        
Route::get('contas/{id}', [ContaController::class, 'show']);     
Route::put('contas/{id}', [ContaController::class, 'update']);   
Route::delete('contas/{id}', [ContaController::class, 'destroy']);

Route::prefix('metas')->group(function () {
    Route::get('/', [MetaController::class, 'index']);       
    Route::post('/', [MetaController::class, 'store']);      
    Route::get('/{id}', [MetaController::class, 'show']);    
    Route::put('/{id}', [MetaController::class, 'update']);  
    Route::delete('/{id}', [MetaController::class, 'destroy']); 
});
