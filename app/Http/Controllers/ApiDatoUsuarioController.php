<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;

class ApiDatoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Usuario::all();
        $i=Session::get('id_usuario');

        return $usuario = Usuario::where('id_usuario','=',$i)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;

        $usuario->usuario = $request->get('usuario');
        $usuario->password = $request->get('password');
        $usuario->nombre = $request->get('nombre');
        $usuario->apellidop = $request->get('apellidop');
        $usuario->apellidom = $request->get('apellidom');
        $usuario->edad = $request->get('edad');
        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $usuario = Usuario::find($id);
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
        $usuario = Usuario::find($id);
        $usuario->usuario=$request->get('usuario');
        $usuario->password=$request->get('password');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellidop=$request->get('apellidop');
        $usuario->apellidom=$request->get('apellidom');
        $usuario->edad=$request->get('edad');
        $usuario->update(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
