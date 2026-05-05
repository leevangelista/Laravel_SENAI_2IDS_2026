<?php
// Estou no arquivo Livro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Livro extends Model
{
    protected $fillable = [
        'nome',
        'autor',
        'descricao',
        'num_pagina',
        'data_publicacao',
        'editora_id'
    ];

    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    public function detalhe(){
        return $this->hasOne(Detalhe::class);
    }
}