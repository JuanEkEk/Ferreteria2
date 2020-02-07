<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acreedor;

class ApiAcreedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Acreedor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acreedor = new Acreedor;

        $acreedor->nombre = $request->get('nombre');
        $acreedor->apellidop = $request->get('apellidop');
        $acreedor->apellidom = $request->get('apellidom');
        $acreedor->edad = $request->get('edad');


        $acreedor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $acreedor = Acreedor::find($id);
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
        $acreedor = Acreedor::find($id);
        $acreedor->nombre=$request->get('nombre');
        $acreedor->apellidop=$request->get('apellidop');
        $acreedor->apellidom=$request->get('apellidom');
        $acreedor->edad=$request->get('edad');


        $acreedor->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Acreedor::destroy($id);
    }
}
