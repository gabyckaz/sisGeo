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
//Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});
//Rutas de registro y login
Auth::routes();
//Ruta de home
Route::get('/home', 'HomeController@index')->name('home');
//Rutas a las que puede accesar Administrador
Route::group(['middleware' => ['role:Admin']], function() {
  Route::resource('adminUser', 'AdminUsuariosController');
  Route::put('/adminUser/add-rol/{usuario}', ['as' => 'adminUser.role.add', 'uses' => 'AdminUsuariosController@agregarRol']);
  Route::put('/adminUser/del-rol/{usuario}', ['as' => 'adminUser.role.del', 'uses' => 'AdminUsuariosController@eliminarRol']);
  Route::put('/adminUser/cambiarEstado/{usuario}', ['as' => 'adminUser.state.change', 'uses' => 'AdminUsuariosController@cambiarEstado']);

});

//Rutas a las que puede accesar el Cliente
Route::group(['middleware' => ['role:User']], function() {
  Route::get('user/completarInformacion', ['as' => 'usuario.completar.informacion', 'uses' => 'userController@editarInformacion']);
  Route::put('user/completarInformacion', ['as' => 'user.completar.informacion.store', 'uses' => 'userController@completarInformacion']);
  Route::get('user/editInfo/{persona}', ['as' => 'user.edit.info', 'uses' => 'userController@editInfoUserTurista']);
  Route::get('user/editInfo', ['as' => 'user.edit.info', 'uses' => 'userController@editInfoUserTurista']);
  Route::get('user/agregarFamiliarAmigo', ['as' => 'user.agregar.familiarAmigo', 'uses' => 'userController@agregarFamiliarAmigo']);
  Route::put('user/agregarFamiliarAmigo', ['as' => 'user.agregar.familiarAmigo.store', 'uses' => 'userController@guardarFamiliarAmigo']);
  Route::get('user/{familiarAmigo}/editarFamiliarAmigo', ['as' => 'user.editar.informacion.familaAmigo', 'uses' => 'userController@editarInformacionFamiliarAmigo']);
  Route::put('user/editarFamiliarAmigo', ['as' => 'user.guardar.informacion.familaAmigoEditado', 'uses' => 'userController@guardarInformacionFamiliarAmigoEditado']);
  Route::resource('user', 'userController');
  //Rutas de reserva
  Route::get('Reservacion/{id}/crear', ['as' => 'adminPaquete.reserva.add', 'uses' => 'ReservacionController@reservar']);
  Route::put('Reservacion/crear', ['as' => 'adminPaquete.reserva.add.store', 'uses' => 'ReservacionController@store']);
  Route::resource('Reservacion', 'ReservacionController');
  //Route::put('/{id}/adminPaquete', ['as' => 'adminPaquete.reserva.add', 'uses' =>  'ReservacionController@reservar']);
});

Route::get('user/pruebaApi', ['as' => 'user.pruebaApi', 'uses' => 'userController@prueba']);

//Rutas a las que puede accesar el Director y el Agente
Route::group(['middleware' => ['role:Director|Agente']], function() {
  //Rutas para empresa de alquiler de transporte
  Route::get('adminEmpresaTransporte/reporte', ['uses' =>  'EmpresaAlquilerTransporteController@reporte','as' => 'adminEmpresaTransporte.reporte']);
  Route::resource('adminEmpresaTransporte', 'EmpresaAlquilerTransporteController');
  //Rutas para agregar tipos de transporte y los nombres de los conductores
  Route::resource('adminTipoTransporte', 'TipoTransporteController');
  Route::post('/adminEmpresaTransporte/{empresalquiler}', ['as' => 'adminEmpresaTransporte.conductor.add', 'uses' =>  'EmpresaAlquilerTransporteController@guardarConductor']);//guarda conductor
  //Rutas para la administración de unidades de transporte
  Route::resource('adminTransporte', 'TransporteController');
  Route::resource('turista', 'TuristaController');
  //Ver ruta turistica
  Route::get('/MostrarRutaTuristica', ['uses' => 'RutaTuristicaController@index', 'as' => 'adminRutaTuristica.index']);
  //Crear ruta
  Route::get('/CrearRutaTuristica', ['uses' => 'RutaTuristicaController@create', 'as' => 'adminRutaTuristica.create']);
  Route::post('/CrearRutaTuristica', ['uses' => 'RutaTuristicaController@store', 'as' => 'adminRutaTuristica.store']);
  Route::get('adminRutaTuristica/reporte', ['uses' =>  'RutaTuristicaController@reporte','as' => 'adminRutaTuristica.reporte']);

  //Actualizar rutas
  Route::get('/EditarRutaTuristica/{id}', ['uses' => 'RutaTuristicaController@edit', 'as' => 'adminRutaTuristica.edit']);
  Route::put('/EditarRutaTuristica/{id}', ['uses' => 'RutaTuristicaController@update', 'as' => 'adminRutaTuristica.update']);
  //Bloquear rutas
  Route::get('/EliminarRutaTuristica/{id}',['uses' =>'RutaTuristicaController@destroy', 'as' => 'adminRutaTuristica.destroy']);
  //Reporte de rutas
  Route::get('adminRutaTuristica/reporte', ['uses' =>  'RutaTuristicaController@reporte','as' => 'adminRutaTuristica.reporte']);
  Route::get('/MostrarRutaTuristica', ['uses' => 'RutaTuristicaController@index', 'as' => 'adminRutaTuristica.index']);
  //Crear categoria
  Route::get('/CrearCategoria', ['uses' => 'CategoriaController@create', 'as' => 'adminCategoria.create']);
  Route::post('/CrearCategoria', ['uses' => 'CategoriaController@store', 'as' => 'adminCategoria.store']);
  //Actualizar categoria
  Route::get('/EditarCategoria/{id}', ['uses' => 'CategoriaController@edit', 'as' => 'adminCategoria.edit']);
  Route::put('/EditarCategoria/{id}', ['uses' => 'CategoriaController@update', 'as' => 'adminCategoria.update']);
  //Bloquear categoria
  Route::get('/EliminarCategoria/{id}',['uses' =>'CategoriaController@destroy', 'as' => 'adminCategoria.destroy']);
  //Ver ruta turistica
  Route::get('/MostrarOpcionesPaquete', ['uses' => 'OpcionesPaqueteController@index', 'as' => 'adminOpcionesPaquete.index']);
  //Opciones paquetes
  Route::get('/CrearOpcionesPaquete', ['uses' => 'OpcionesPaqueteController@create', 'as' => 'adminOpcionesPaquete.create']);
  Route::post('/CrearOpcionesPaquete', ['uses' => 'OpcionesPaqueteController@store','as' => 'adminOpcionesPaquete.store']);
  //Actualizar paquetes
  Route::get('/EditarOpcionesPaquete/{id}', ['uses' => 'OpcionesPaqueteController@edit', 'as' => 'adminOpcionesPaquete.edit']);
  Route::put('/EditarOpcionesPaquete/{id}', ['uses' => 'OpcionesPaqueteController@update', 'as' => 'adminOpcionesPaquete.update',]);
  //Bloquear paquetes
  Route::get('/EliminarOpcionesPaquete/{id}',['uses' =>'OpcionesPaqueteController@destroy', 'as' => 'adminOpcionesPaquete.destroy']);
  Route::post('/CrearIncluye', ['uses' => 'OpcionesPaqueteController@guardarincluye', 'as' => 'adminOpcionesPaquete.guardarincluye']);
  Route::post('/CrearRecomendaciones', ['uses' => 'OpcionesPaqueteController@guardarrecomendaciones', 'as' => 'adminOpcionesPaquete.guardarrecomendaciones']);
  Route::post('/CrearCondiciones', ['uses' => 'OpcionesPaqueteController@guardarcondiciones', 'as' => 'adminOpcionesPaquete.guardarcondiciones']);
  Route::post('/CrearItinerario', ['uses' => 'OpcionesPaqueteController@guardaritinerario', 'as' => 'adminOpcionesPaquete.guardaritinerario']);
  Route::get('/eliminarGastosExtras/{id}', ['uses' => 'OpcionesPaqueteController@eliminargastosextras', 'as' => 'adminOpcionesPaquete.eliminargastosextras']);
  Route::get('/eliminarRecomendaciones/{id}', ['uses' => 'OpcionesPaqueteController@eliminarrecomendaciones', 'as' => 'adminOpcionesPaquete.eliminarrecomendaciones']);
  Route::get('/eliminarIncluye/{id}', ['uses' => 'OpcionesPaqueteController@eliminarincluye', 'as' => 'adminOpcionesPaquete.eliminarincluye']);
  Route::get('/eliminarItinerario/{id}', ['uses' => 'OpcionesPaqueteController@eliminaritinerario', 'as' => 'adminOpcionesPaquete.eliminaritinerario']);
  Route::get('/eliminarCondiciones/{id}', ['uses' => 'OpcionesPaqueteController@eliminarcondiciones', 'as' => 'adminOpcionesPaquete.eliminarcondiciones']);
  Route::get('/eliminarCategoria/{id}', ['uses' => 'CategoriaController@eliminarcategoria', 'as' => 'adminCategoria.eliminarcategoria']);

  //INICIO  PAQUETES
  //Ver paquetes
  Route::get('/MostrarPaquete', ['uses' => 'PaqueteController@index','as' => 'adminPaquete.index']);
  //Crear paquetes
  Route::get('/CrearPaquete', ['uses' => 'PaqueteController@create', 'as' => 'adminPaquete.create']);
  Route::post('/CrearPaquete', ['uses' => 'PaqueteController@store', 'as' => 'adminPaquete.create']);
  //Actualizar paquetes
  Route::get('/EditarPaquete/{id}', ['uses' => 'PaqueteController@edit', 'as' => 'adminPaquete.edit']);
  Route::put('/EditarPaquete/{id}', ['uses' => 'PaqueteController@update', 'as' => 'adminPaquete.update']);
  //Bloquear paquetes
  Route::get('/EliminarPaquete/{id}',['uses' =>'PaqueteController@destroy', 'as' => 'adminPaquete.destroy']);
  //AGREGAR TRANSPORTE A PAQUETE
  Route::get('/MostrarPaquete/{id}', ['uses' => 'PaqueteController@edittransporte', 'as' => 'adminPaquete.show']);
  Route::put('/MostrarPaquete/{id}', ['uses' => 'PaqueteController@asignartransporte', 'as' => 'adminPaquete.show']);
  //AGREGAR CONDUCTOR A PAQUETE
  Route::post('/MostrarPaquete/{id}', ['uses' => 'PaqueteController@asignarconductor', 'as' => 'adminPaquete.show']);
  Route::get('/ListarConductores', ['uses' => 'PaqueteController@listarConductores','as' => 'adminPaquete.listaConductores']);
  //Reporte de listado de paquetes
  Route::get('/reporte/{id}', ['uses' =>  'PaqueteController@reporte','as' => 'adminPaquete.reporte']);
  //CREAR COPIA DE PAQUETE
  Route::put('/asignaTransCondPaquete/{id}', ['uses' => 'PaqueteController@asignaTransCondPaquete', 'as' => 'adminPaquete.asignaTransCondPaquete']);
  Route::get('/CrearCopiaPaquete/{id}', ['uses' => 'PaqueteController@createcopia', 'as' => 'adminPaquete.createcopia']);
  //GUARDAR COPIA DE PAQUETE
  Route::post('/CrearCopiaPaquete/{id}', ['uses' => 'PaqueteController@storecopia', 'as' => 'adminPaquete.createcopia']);
  //Mostrar paquetes para agregarles Costos
  Route::get('/PaquetesCostos', ['uses' => 'CostoAlquilerTransporteController@index','as' => 'adminPaquete.costos.index']);
  //agregar Costos
  Route::get('/PaquetesCostos/{id}', ['uses' => 'CostoAlquilerTransporteController@create','as' => 'adminPaquete.costos.create']);
  //Guardar costos
  Route::post('/PaquetesCostos/{id}', ['uses' => 'CostoAlquilerTransporteController@store', 'as' => 'adminPaquete.costos.store']);
  Route::get('/ReporteCostos', ['uses' => 'CostoAlquilerTransporteController@reporte','as' => 'adminPaquete.costos.reporte']);
  //FIN RUTAS PAQUETES
});

//MOSTRAR PAQUETES A USUARIOS COMO VISITANTES
Route::get('/MostrarPaqueteCliente/{id}', ['uses' => 'PaqueteController@getSingle', 'as' => 'adminPaquete.single']);

//Rutas a las que solo puede accesar visitante sin hacer login
Route::group(['middleware' => ['guest']], function () {
        Route::get('/', ['uses' => 'PaqueteController@show',
          'as' => 'welcome',
        ]);
});

//Rutas a las que solo puede accesar el Director
Route::group(['middleware' => ['role:Director']], function () {
  Route::get('/ActualizarEstadoPaquete', ['uses' => 'PaqueteController@cambiarEstado', 'as' => 'adminPaquete.estado']);
  Route::put('/ActualizarEstadoPaquete/{id}', ['uses' => 'PaqueteController@cambiarEstado2', 'as' => 'adminPaquete.estado2']);
});
