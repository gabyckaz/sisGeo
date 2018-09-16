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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('adminUser', 'AdminUsuariosController');

Route::get('user/completarInformacion', ['as' => 'usuario.completar.informacion', 'uses' => 'userController@editarInformacion']);
Route::put('user/completarInformacion', ['as' => 'user.completar.informacion.store', 'uses' => 'userController@completarInformacion']);
Route::get('user/editInfo/{persona}', ['as' => 'user.edit.info', 'uses' => 'userController@editInfoUserTurista']);
Route::get('user/editInfo', ['as' => 'user.edit.info', 'uses' => 'userController@editInfoUserTurista']);
Route::get('user/agregarFamiliarAmigo', ['as' => 'user.agregar.familiarAmigo', 'uses' => 'userController@agregarFamiliarAmigo']);
Route::put('user/agregarFamiliarAmigo', ['as' => 'user.agregar.familiarAmigo.store', 'uses' => 'userController@guardarFamiliarAmigo']);
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
Route::resource('turista', 'TuristaController');


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
                'as' => 'adminRutaTuristica.store',
            ]);

            //Actualizar paquetes
            Route::get('/EditarRutaTuristica/{id}', [
                'uses' => 'RutaTuristicaController@edit',
                'as' => 'adminRutaTuristica.edit',
            ]);

            Route::put('/EditarRutaTuristica/{id}', [
                'uses' => 'RutaTuristicaController@update',
                'as' => 'adminRutaTuristica.update',
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

            //MOSTRAR PAQUETES A CLIENTES
            Route::get('/MostrarPaqueteCliente/{id}', [
              'uses' => 'PaqueteController@getSingle',
              'as' => 'adminPaquete.single',
            ]);



        /*FIN RUTAS PAQUETES*/

Route::group(['middleware' => ['guest']], function () {
        //solo los visitantes sin login pueden accesar aquí
        Route::get('/', ['uses' => 'PaqueteController@show',
          'as' => 'welcome',
        ]);
});
