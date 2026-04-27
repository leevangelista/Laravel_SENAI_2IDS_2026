<?php
// estou no LivroController.php
namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Editora;
use App\Models\Detalhe;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function listar(){
        $livros = Livro::with('editora','detalhe')->get();
        return view('listar', compact('livros'));
    }

    public function cadastro(){
        $editoras = Editora::get();
        return view('cadastro', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'num_pagina' => 'numeric|max:255',
            'data_publicacao' => 'date|max:255',
            'editora_id' => 'nullable|exists:editoras,id',
            'custo' => 'numeric|max:255',
            'preco_venda' => 'numeric|max:255',
            'imposto' => 'numeric|max:255',
        ]);

        $livro = Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'num_pagina' => $request->num_pagina,
            'data_publicacao' => $request->data_publicacao,
            'editora_id' => $request->editora_id
        ]);

        Detalhe::create([
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'imposto' => $request->imposto,
            'livro_id' => $livro->id
        ]);



        return redirect()->back()->with('success','Livro Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $livro = Livro::with('detalhe')->findOrFail($id);
        $editoras = Editora::get();
        return view('atualizar', compact('livro','editoras'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'num_pagina' => 'numeric|max:255',
            'data_publicacao' => 'date|max:255',
            'editora_id' => 'nullable|exists:editoras,id',
            'custo' => 'numeric|max:255',
            'preco' => 'numeric|max:255',
            'imposto' => 'numeric|max:255',
        ]);

        $livro = Livro::findOrFail($id);
        $detalhe = Detalhe::where('livro_id',$livro->id)->first();

        $livro->nome = $request->nome; 
        $livro->autor = $request->autor;
        $livro->descricao = $request->descricao;
        $livro->num_pagina = $request->num_pagina;
        $livro->data_publicacao = $request->data_publicacao;
        $livro->editora_id = $request->editora_id;

        $detalhe->custo = $request->custo;
        $detalhe->preco_venda = $request->preco_venda;
        $detalhe->imposto = $request->imposto;

        $livro->save();
        $detalhe->save();
        return redirect()->back()->with('success','livro atualizado com suceso');
    }
}