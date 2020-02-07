<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class ApiTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tipo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoarticulo = new Tipo;
        $tipoarticulo->nombre = $request->get('nombre');
        $tipoarticulo->id_categoria = $request->get('id_categoria');
        $tipoarticulo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $tipo = Tipo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoarticulo = Tipo::find($id);
        $tipoarticulo->nombre=$request->get('nombre');
        $tipoarticulo->id_categoria = $request->get('id_categoria');
        $tipoarticulo->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Tipo::destroy($id);
    }
}
