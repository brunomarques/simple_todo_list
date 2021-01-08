<?php

namespace App\Http\Controllers;

use App\Models\ItemAtividade;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemAtividadeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maxOrdem = ItemAtividade::where('atividade_id', $request -> atividade_id)->max('ordem');
        $maxOrdem = is_null($maxOrdem) ? 0 : $maxOrdem;

        $item = new ItemAtividade();
        $item -> nome         = $request -> item;
        $item -> atividade_id = $request -> atividade_id;
        $item -> ordem        = $maxOrdem + 1;

        if($item -> save()) {
            return response() -> json([
                'message' => "Ítem criado com sucesso!",
                'type'    => 'success',
                'item'    => $item
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemAtividade  $item_de_atividade
     * @return \Illuminate\Http\Response
     */
    public function show(ItemAtividade $item_de_atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemAtividade  $item_de_atividade
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemAtividade $item_de_atividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemAtividade  $item_de_atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemAtividade $item_de_atividade)
    {
        $item_de_atividade -> nome = $request->item_de_atividade;
        if($item_de_atividade -> save()) {
            return response() -> json([
                'message' => "Item alterado com sucesso!",
                'type'    => 'success',
                'item'    => $item_de_atividade
            ], 200);
        }
        else {
            return response() -> json([
                'message' => "Erro ao alterar o item!",
                'type'    => 'error'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemAtividade  $item_de_atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemAtividade $item_de_atividade)
    {
        $id = $item_de_atividade -> id;

        if($item_de_atividade -> delete()) {
            return response() -> json([
                'message' => "Item removido com sucesso!",
                'type'    => 'success',
                'item_id' => $id
            ], 200);
        }
        else {
            return response() -> json([
                'message' => "Erro ao remover o item!",
                'type'    => 'error'
            ], 200);
        }
    }

    public function conclude(Request $request)
    {
        $item_de_atividade = ItemAtividade::find($request -> item_de_atividade);
        $item_de_atividade -> concluded_at = is_null($item_de_atividade -> concluded_at) ? Carbon::now() : NULL;

        if($item_de_atividade -> save()) {
            return response() -> json([
                'message' => "Item conclído com sucesso!",
                'type'    => 'success',
                'item'    => $item_de_atividade
            ], 200);
        }
        else {
            return response() -> json([
                'message' => "Erro ao concluir o item!",
                'type'    => 'error'
            ], 200);
        }
    }
}
