<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;

Route::get('/', function () {
    return view('welcome');
});

// GET - listar os usuários cadastrados
Route::get('/livro/listar',[LivroController::class, 'listar'])->
name('livro.listar');

Route::get('/livro/cadastrar',[LivroController::class, 'cadastro']
)->name('livro.cadastro');


// POST - enviar os dados para cadastrar livros
Route::post('/livro/salvar',[LivroController::class, 'add'])
->name('livro.salvar');

// Tela de Atualizar
Route::get('/livro/{id}/atualizar', [LivroController::class, 'atualizar'])
->name('livro.atualizar');

Route::put('/livro/{id}/update',[LivroController::class, 'update'])
->name('livro.update');

// ROTAS DA EDITORA

// GET - listar os usuários cadastrados
Route::get('/editora/listar',[EditoraController::class, 'listar'])->
name('editora.listar');

Route::get('/editora/cadastrar', function(){ 
    return view('cadastroEditora');
})->name('editora.cadastro');

Route::post('/editora/salvar',[EditoraController::class, 'add'])
->name('editora.salvar');