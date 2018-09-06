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

Route::get('user/completarInformacion', ['as' => 'usuario.completar.informacion', 'uses' => 'userController@editarInformacion']);
Route::put('user/completarInformacion', ['as' => 'user.completar.informacion.store', 'uses' => 'userController@completarInformacion']);
Route::get('user/editInfo/{persona}', ['as' => 'user.edit.info', 'uses' => 'userController@editInfoUserTurista']);
Route::get('user/editInfo', ['as' => 'user.edit.info', 'uses' => 'userController@editInfoUserTurista']);
Route::get('user/agregarFamiliarAmigo', ['as' => 'user.add.familiarAmigo', 'uses' => 'userController@addFamiliarAmigo']);
Route::resource('user', 'userController');

Route::put('/adminUser/add-rol/{usuario}', ['as' => 'adminUser.role.add', 'uses' => 'AdminUsuariosController@agregarRol']);
Route::put('/adminUser/del-rol/{usuario}', ['as' => 'adminUser.role.del', 'uses' => 'AdminUsuariosController@eliminarRol']);
Route::put('/adminUser/cambiarEstado/{usuario}', ['as' => 'adminUser.state.change', 'uses' => 'AdminUsuariosController@cambiarEstado']);

Route::resource('adminEmpresaTransporte', 'EmpresaAlquilerTransporteController');//Rutas para empresa de alquiler de transporte

//Rutas para agregar tipos de transporte y los nombres de los conductores
Route::get('/adminTipoTransporte', ['as' => 'adminTipoTransporte.index', 'uses' =>  'TipoTransporteController@index']);//muestra listado de tipos y conductuctores
Route::post('/adminTipoTransporte/index', ['as' => 'adminTipoTransporte.store', 'uses' =>  'TipoTransporteController@store']);//guarda tipo transporte
Route::post('/adminTipoTransporte', ['as' => 'adminConductor.guardarConductor', 'uses' =>  'TipoTransporteController@guardarConductor']);//guarda conductor

Route::resource('adminTransporte', 'TransporteController');

<<<<<<< HEAD
//INICIO RUTAS PAIS

            //Ver pais
            Route::get('/MostrarPais', [
              'uses' => 'PaisController@index',
              'as' => 'adminPais.index',
            ]);

            //Crear pais
            Route::get('/CrearPais', [
                'uses' => 'PaisController@create',
                'as' => 'adminPais.create',
            ]);

            Route::post('/CrearPais', [
                'uses' => 'PaisController@store',
                'as' => 'adminPais.create',
            ]);

            //Actualizar pais
            Route::get('/EditarPais/{id}', [
                'uses' => 'PaisController@edit',
                'as' => 'adminPais.edit',
            ]);

            Route::put('/EditarPais/{id}', [
                'uses' => 'PaisController@update',
                'as' => 'adminPais.edit',
            ]);

            //Bloquear pais
            Route::get('/EliminarPais/{id}',[
                'uses' =>'PaisController@destroy',
                'as' => 'adminPais.destroy'
            ]);

        /*FIN RUTAS PAQUETES*/
//INICIO RUTAS TURISTICA

            //Ver ruta turistica
            Route::get('/MostrarRutaTuristica', [
              'uses' => 'RutaTuristicaController@index',
              'as' => 'adminRutaTuristica.index',
            ]);

            //Crear paquetes
            Route::get('/CrearRutaTuristica', [
                'uses' => 'RutaTuristicaController@create',
                'as' => 'adminRutaTuristica.create',
            ]);

            Route::post('/CrearRutaTuristica', [
                'uses' => 'RutaTuristicaController@store',
                'as' => 'adminRutaTuristica.create',
            ]);

            //Actualizar paquetes
            Route::get('/EditarRutaTuristica/{id}', [
                'uses' => 'RutaTuristicaController@edit',
                'as' => 'adminRutaTuristica.edit',
            ]);

            Route::put('/EditarRutaTuristica/{id}', [
                'uses' => 'RutaTuristicaController@update',
                'as' => 'adminRutaTuristica.edit',
            ]);

            //Bloquear paquetes
            Route::get('/EliminarRutaTuristica/{id}',[
                'uses' =>'RutaTuristicaController@destroy',
                'as' => 'adminRutaTuristica.destroy'
            ]);

        /*FIN RUTAS PAQUETES*/

        //INICIO RUTAS PAQUETES

            //Ver paquetes
            Route::get('/MostrarPaquete', [
              'uses' => 'PaqueteController@index',
              'as' => 'adminPaquete.index',
            ]);

            //Crear paquetes
            Route::get('/CrearPaquete', [
                'uses' => 'PaqueteController@create',
                'as' => 'adminPaquete.create',
            ]);

            Route::post('/CrearPaquete', [
                'uses' => 'PaqueteController@store',
                'as' => 'adminPaquete.create',
            ]);

            //Actualizar paquetes
            Route::get('/EditarPaquete/{id}', [
                'uses' => 'PaqueteController@edit',
                'as' => 'adminPaquete.edit',
            ]);

            Route::put('/EditarPaquete/{id}', [
                'uses' => 'PaqueteController@update',
                'as' => 'adminPaquete.edit',
            ]);

            //Bloquear paquetes
            Route::get('/EliminarPaquete/{id}',[
                'uses' =>'PaqueteController@destroy',
                'as' => 'adminPaquete.destroy'
            ]);

        /*FIN RUTAS PAQUETES*/
=======
Route::resource('turista', 'TuristaController');											
>>>>>>> 180cd9cec8769567ff75fb45f9b31ed6b4dd9b65
