<?php
// estou no ProdutiController.php
namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar(){
        $setores = Setores::all();
        return view('listarSetores', compact('setores'));
    }

    public function listarApi(){
        $setores = Setores::all(); // Busca todos os registros da tabela setores
        return response()->json($setores);
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        Setores::create([
            'nome' => $request->nome,
            'num_setor' => $request->num_setor
        ]);

        return redirect()->back()->with('success','Setor Cadastrado com sucesso!');

    }

    public function addApi(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        $setor = Setores::create([
            'nome' => $request->nome,
            'num_setor' => $request->num_setor
        ]);

        // Resposta diferenciada para Web ou API
        // expectsJson -> verifica se rota vem de api.php e se o cabeçalho é Accept: application/json
        // wantsJson -> verifica apenas se o cabeçalho é Accept: application/json, independe do arquivo de rota, utilizado por exemplo em requisicao js no proprio laravel
        //if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Setor criado!',
                'setor' => $setor
            ], 200);
        //}
    }

    public function atualizarApi(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        $setor = Setores::findOrFail($id); // buscar setor para ser atualizado

        $setor->nome = $request->nome;
        $setor->num_setor = $request->num_setor;

        $setor->save();

        return response()->json([
            'message' => 'Setor atualizado!',
            'setor' => $setor
        ], 200);
    }

    public function deletarApi($id){
        $setor = Setores::findOrFail($id);
        $setor->delete();

        return response()->json([
            'message' => 'Setor Deletado!'
        ], 200);
    }

}