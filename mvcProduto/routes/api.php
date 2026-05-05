<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('setor/add', [SetorController::class, 'addApi']);
Route::get('setores', [SetorController::class, 'listarApi']);
Route::put('setor/atualizar/{id}', [SetorController::class, 'atualizarApi']);
Route::delete('setor/deletar/{id}', [SetorController::class, 'deletarApi']);
