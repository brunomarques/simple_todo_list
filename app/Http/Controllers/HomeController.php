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

        return view('home', compact('atividades'));
    }

    public function listaAtividade(Request $request)
    {
        $arrayLista   = $request -> lista;
        $atividade_id = $request -> atividade;
        dd($request);

        $parentId = "";
        foreach($arrayLista as $lista) {
            $qtde_item_de_item = 0;
            //Verificar se é a ponta da lista, o item 0 da tela
                if(((int)$lista["order"] != 0) && (!isset($lista["parentId"]))) {
                    $qtde_item_de_item = ItemItem::where("item_atividades_id", $atividade_id)->where("item_id", $lista["id"])->count();
                }
                elseif(((int)$lista["order"] === 0) && (isset($lista["parentId"]))) {
                    $qtde_item_de_item = ItemItem::where("item_atividades_id", $lista["parentId"])->where("item_id", $lista["id"])->count();
                    $parentId = $lista["parentId"];
                }
                else {

                }
                /*if($qtdeItem === 0) {
                    $itemAtividade = new ItemAtividade();
                    $itemAtividade -> nome         = $request -> item_nome;
                    $itemAtividade -> atividade_id = $request -> atividade;
                    dd($itemAtividade);
                }*/
            dump($lista, "lista_id: {$lista["id"]}", "atividade_id: {$atividade_id}", "parentId: {$parentId}", "qtde_item: {$qtde_item_de_item}");
        }
    }
}
