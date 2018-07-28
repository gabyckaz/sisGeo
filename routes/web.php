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

Route::put('/adminUser/add-rol/{usuario}', ['as' => 'adminUser.role.add', 'uses' => 'AdminUsuariosController@agregarRol']);
Route::put('/adminUser/del-rol/{usuario}', ['as' => 'adminUser.role.del', 'uses' => 'AdminUsuariosController@eliminarRol']);

Route::resource('adminEmpresaTransporte', 'EmpresaAlquilerTransporteController');//Rutas para empresa de alquiler de transporte

//Rutas para agregar tipos de transporte y los nombres de los conductores
Route::get('/adminTipoTransporte', ['as' => 'adminTipoTransporte.index', 'uses' =>  'TipoTransporteController@index']);//muestra listado de tipos y conductuctores
Route::post('/adminTipoTransporte/index', ['as' => 'adminTipoTransporte.store', 'uses' =>  'TipoTransporteController@store']);//guarda tipo transporte
Route::post('/adminTipoTransporte', ['as' => 'adminConductor.guardarConductor', 'uses' =>  'TipoTransporteController@guardarConductor']);//guarda conductor

Route::resource('adminTransporte', 'TransporteController');
