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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('adminUser', 'AdminUsuariosController');

Route::resource('user', 'userController');

Route::put('/adminUser/add-rol/{usuario}', ['as' => 'adminUser.role.add', 'uses' => 'AdminUsuariosController@agregarRol']);
Route::put('/adminUser/del-rol/{usuario}', ['as' => 'adminUser.role.del', 'uses' => 'AdminUsuariosController@eliminarRol']);
Route::put('/adminUser/cambiarEstado/{usuario}', ['as' => 'adminUser.state.change', 'uses' => 'AdminUsuariosController@cambiarEstado']);

Route::resource('adminEmpresaTransporte', 'EmpresaAlquilerTransporteController');//Rutas para empresa de alquiler de transporte

//Rutas para agregar tipos de transporte y los nombres de los conductores
Route::resource('adminTipoTransporte', 'TipoTransporteController');
Route::post('/adminEmpresaTransporte/{empresalquiler}', ['as' => 'adminEmpresaTransporte.conductor.add', 'uses' =>  'EmpresaAlquilerTransporteController@guardarConductor']);//guarda conductor
//Rutas para la administración de unidades de transporte
Route::resource('adminTransporte', 'TransporteController');
