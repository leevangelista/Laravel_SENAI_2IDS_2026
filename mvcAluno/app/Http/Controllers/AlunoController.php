<?php
// estou no AlunoController.php
namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get(); // select * from alunos
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'turma_id' => 'nullable|exists:turmas,id' 
            // para poder ser nulo ou existir na tabela turmas
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
        ]);

        return redirect()->back()->with('success','Aluno Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id); // Busca o aluno pelo ID
        // select * from alunos where id = $id
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrFail($id); // buscar aluno para ser atualizado

        $aluno->nome = $request->nome; // atualizando o campo nome
        $aluno->email = $request->email; // atualizando o campo email

        $aluno->save(); // salvando no banco de dados(fazendo update)
        return redirect()->back()->with('success','Aluno atualizado com suceso');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id); // buscar o aluno para depois deletar
        $aluno->delete(); // faz o delete no banco de dados

        return redirect()->route('aluno.listar')
            ->with('success','Aluno excluído com sucesso!');
    }

}