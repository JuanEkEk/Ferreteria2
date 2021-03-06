<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Login.ingreso');
});

//zona de vistas
Route::view('sucursal','Sucursales.sucursal');
Route::view('proveedor','Proveedores.proveedor');
Route::view('acreedor','Acreedores.acreedor');
Route::view('categoria','Categorias.categoria');
Route::view('tipo_articulo','Categorias.tipo');
Route::view('perfil','Perfil.perfil');
Route::view('user','Perfil.perfilvendedor');
Route::view('error','Error.error');


Route::view('menu','layouts.masterusermenu');

//Zona de movimientos
Route::view('entrada','Movimientos.entrada');

//Zona de ventas
Route::view('ventas','Vendedor.ventas');




//zona de apis
Route::apiResource('apiSucursal','ApiSucursalController');
Route::apiResource('apiProveedor','ApiProveedorController');
Route::apiResource('apiAcreedor','ApiAcreedorController');
Route::apiResource('apiCategoria','ApiCategoriaController');
Route::apiResource('apiTipo','ApiTipoController');
Route::apiResource('apiRol','ApiRolController');
Route::apiResource('apiDatosUsuario','ApiDatoUsuarioController');
Route::apiResource('apiProducto','ApiProductoController');
Route::apiResource('apiEntrada','ApiEntradaController');
Route::apiResource('apiVenta','ApiVentaController');
Route::apiResource('apiDetalleEntrada','ApiDetalleEntradaController');
Route::apiResource('apiDetalleVenta','ApiDetalleVentaController');

//zona de logeo
Route::post('login','ApiUsuarioController@validar');
Route::get('salir','ApiUsuarioController@salir');
