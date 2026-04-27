<?php
// Estou no arquivo Detalhe.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Detalhe extends Model
{
    protected $fillable = [
        'custo',
        'preco_venda',
        'imposto',
        'livro_id'
    ];

    public function livro(){
        return $this->belongsTo(Livro::class);
    }
}