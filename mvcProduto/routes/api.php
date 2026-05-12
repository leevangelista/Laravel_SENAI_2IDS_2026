<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// estou no api.php
Route::get('setores',[SetorApiController::class, 'listarApi']);
Route::post('setor/add',[SetorApiController::class, 'addApi']);