<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtividadeController extends Controller
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
        $maxOrdem = 0;
        if(!is_null(Atividade::max('ordem'))) {
            $maxOrdem = Atividade::max('ordem');
        }

        $atividade = new Atividade();
        $atividade -> nome    = $request -> tarefa;
        $atividade -> user_id = Auth::user()->id;
        $atividade -> ordem   = $maxOrdem++;

        if($atividade -> save()) {
            return response() -> json([
                'message' => "Atividade criada com sucesso!",
                'type'    => 'success',
                'atividade' => $atividade
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Atividade $atividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atividade $atividade)
    {
        $atividade -> nome = $request->tarefa;
        if($atividade -> save()) {
            return response() -> json([
                'message'   => "Atividade alterada com sucesso!",
                'type'      => 'success',
                'atividade' => $atividade
            ], 200);
        }
        else {
            return response() -> json([
                'message' => "Erro ao alterar atividade!",
                'type'    => 'error'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atividade $atividade)
    {
        $id = $atividade -> id;

        if($atividade -> delete()) {
            return response() -> json([
                'message'      => "Atividade removida com sucesso!",
                'type'         => 'success',
                'atividade_id' => $id
            ], 200);
        }
        else {
            return response() -> json([
                'message' => "Erro ao remover atividade!",
                'type'    => 'error'
            ], 200);
        }
    }
}
