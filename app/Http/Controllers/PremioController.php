<?php

namespace App\Http\Controllers;

use App\Premio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PremioController extends Controller
{
    public function index(){
        date_default_timezone_set('America/Sao_Paulo');
        $datadiaria = date('d/m/Y');
        $data_comparativa = date('Y-m-d');


        $premios = DB::table('premios')
            ->select("nome_premio","descricao_premio","hora_inicio")
            ->where([
                "data_bingo" => $data_comparativa
            ])->get();

        return view('bingo.premios',compact('premios','datadiaria'));
    }

    public function viewCadPremios(){
        return view('bingo.view-premios-cad');
    }

    public function addPremio(Request $request){
        $dadosPremio = $request->all();
        $premio = Premio::create($dadosPremio);

        if($premio){
            return redirect()
                            ->route('view-cad-premios')
                            ->with("success","Êxito, prêmio cadastrado com sucesso");
        }else{
            return redirect()
                ->route('view-cad-premios')
                ->with("error","Erro ao cadastrar prêmio");
        }
    }
}
