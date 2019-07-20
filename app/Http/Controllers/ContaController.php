<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use Auth;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Conta::where('user_id','=', Auth::id())->get()->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = Auth::id();

        $conta = Conta::create($dados);
        return $conta->getUuid();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return response()->json(Conta::findByUuid($uuid));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $conta = Conta::findByUuid($uuid);
        $conta->update($request->all());

        return response()->json($conta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $conta = Conta::findByUuid($uuid);
        $conta->delete();
        return response()->json('Registro deletado com sucesso');
    }
}
