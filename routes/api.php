<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('metas')->group(function () {
    Route::get('/', [MetaController::class, 'index']);       
    Route::post('/', [MetaController::class, 'store']);      
    Route::get('/{id}', [MetaController::class, 'show']);    
    Route::put('/{id}', [MetaController::class, 'update']);  
    Route::delete('/{id}', [MetaController::class, 'destroy']); 
});
