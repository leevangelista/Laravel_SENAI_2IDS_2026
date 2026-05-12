<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
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

        return response()->json([
            'message' => 'Setor Criado',
            'setor' => $setor
        ], 200);
    }
}