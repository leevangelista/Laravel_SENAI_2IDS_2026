<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'pais',
        'cidade'
    ];

    public function livro(){
        return $this->hasMany(Livro::class);
    }
}