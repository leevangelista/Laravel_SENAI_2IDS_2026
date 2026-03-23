<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

// GET - listar os usuários cadastrados
Route::get('/aluno/listar',[AlunoController::class, 'listar'])->
name('aluno.listar');

Route::get('/aluno/cadastrar', function(){ 
    return view('cadastro');
})->name('aluno.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/aluno/salvar',[AlunoController::class, 'add'])
->name('aluno.salvar');