<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use Redirect;
use Cache;
use Cookie;

class ApiUsuarioController extends Controller
{
 public function validar(Request $request){
 	$usuario = $request->user;
 	$password = $request->password;

 	$resp = Usuario::where('usuario','=',$usuario)
 	->where('password','=',$password)
 	->get();

 	if(count($resp)>0)
 	{
 		$usuario = $resp[0]->nombre.' '.$resp[0]->apellidop.' '.$resp[0]->apellidom;
 		Session::put('usuario',$usuario);
 		Session::put('rol',$resp[0]->rol->nombre);
 		Session::put('id_usuario',$resp[0]->id_usuario);
 		if($resp[0]->rol->nombre == "Administrador"){
 			return Redirect::to('perfil');
 		}
 		else if($resp[0]->rol->nombre == "Vendedor"){
 			return Redirect::to('user');
 		}
 	}
 	else{
 		return Redirect::to('error');
 	}
 }

 public function salir(){
 	Session::flush();
 	Session::reflash();
 	Cache::flush();
 	Cookie::forget('laravel_session');
 	unset($_COOKIE);
 	unset($_SESSION);
 	return Redirect::to('/');
 }  
}
