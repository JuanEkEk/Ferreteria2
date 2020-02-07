<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;


class ApiSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sucursal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = new Sucursal;

        $sucursal->nombre = $request->get('nombre');
        $sucursal->localidad = $request->get('localidad');
        $sucursal->calle = $request->get('calle');
        $sucursal->cruzamientoa = $request->get('cruzamientoa');
        $sucursal->cruzamientob = $request->get('cruzamientob');

        $sucursal->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $sucursal = Sucursal::find($id);
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
        $sucursal = Sucursal::find($id);
        $sucursal->nombre=$request->get('nombre');
        $sucursal->localidad=$request->get('localidad');
        $sucursal->calle=$request->get('calle');
        $sucursal->cruzamientoa=$request->get('cruzamientoa');
        $sucursal->cruzamientob=$request->get('cruzamientob');
        $sucursal->update();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Sucursal::destroy($id);
    }
}
