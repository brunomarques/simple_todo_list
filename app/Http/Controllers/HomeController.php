<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\ItemAtividade;
use App\Models\ItemItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $atividades = Atividade::query()->where('user_id', Auth::user()->id)->orderBy('ordem', 'ASC')->get();
        $arrayFinal = [];
        $arraySuporte = "";
        $arraySuporteIA = [];
        $arraySuporteIT = [];

        //Atividades
        foreach($atividades as $atividade) {
            $arraySuporte = $atividade -> toArray();

            //Itens da atividade
            $itens_atividade = $atividade -> itens_atividade;
            foreach($itens_atividade as $item_atividade) {
                $item_atividade -> itensItens; //Carrega os itens dos itens

                $itens_do_item = $item_atividade -> toArray();
                /*if(!is_null($itens_do_item["itens_itens"])) {
                    foreach($itens_do_item["itens_itens"] as $item_item) {
                        dump($itens_do_item, $item_item);
                        $itens_do_item["itens_itens"]["filhos"] = $item_item;
                    }
                }
                else {
                    $itens_do_item["itens_itens"]["filhos"] = null;
                }*/

                array_push($arraySuporteIA, $itens_do_item);
            }
            $arraySuporte["itens"] = $arraySuporteIA;

            array_push($arrayFinal, $arraySuporte);
            $arraySuporteIA = [];

            //dd($arrayFinal);
        }

        return view('home', compact('arrayFinal'));
    }

    public function listaAtividade(Request $request)
    {
        $arrayLista   = $request -> lista;
        $atividade_id = $request -> atividade;
        $item_nome    = []; //$request -> item_nome;
        $erro = 0;

        ItemItem::where("atividade_id", $atividade_id ) -> forceDelete();
        foreach($arrayLista as $lista) {
            if(isset($lista["parentId"])) {
                $arrayIdLista = explode("-", $lista["id"]);
                $idItem       = end($arrayIdLista);
                $pai_id       = "";

                $arrayIdPai = explode("-", $lista["parentId"]);
                $pai_id     = end($arrayIdPai);

                $itemAtividade = ItemAtividade::query() -> select("nome") -> where("id", $idItem)->first();

                $itemItem = new ItemItem();
                $itemItem -> atividade_id  = $atividade_id;
                $itemItem -> item_pai_id   = $pai_id;
                $itemItem -> item_filho_id = $idItem;
                $itemItem -> ordem         = (int)$lista["order"];
                $itemItem -> nome          = $itemAtividade -> nome;

                if(!($itemItem -> save())) {
                    $erro++;
                    array_push($item_nome, $itemAtividade -> nome);
                }
            }
        }

        if($erro > 0) {
            $msgErro   = "O(s) item(ns) não inserido(s) foi(ram): ";
            $itensErro = "";

            for($i = 0; $i < count($item_nome); $i++) {
                $itensErro .= $item_nome[$i]." e ";
            }
            $itensErro = substr($itensErro, 0, -3);
            $msgErro .= $itensErro;

            return response() -> json([
                'message' => "Erro ao reformular a lista de tarefas da atividade!<br>{$msgErro}",
                'type'    => 'error'
            ], 200);
        }
        else {
            return response() -> json([
                'message' => "Lista de tarefas da atividade reformulada com sucesso!",
                'type'    => 'success'
            ], 200);
        }
    }
}
