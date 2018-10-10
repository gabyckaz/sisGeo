<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Reservacion;
use App\Turista;
use App\User;
use App\Persona;
use DB;
use App\ImagenPaqueteTuristico;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * La pantalla del home, con reservas y paquetes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
        $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);
        $imagenes = ImagenPaqueteTuristico::all();
        $usuarioreservando = Turista::where('IdPersona',auth()->user()->IdPersona)->first();     
        $reservaciones = Reservacion::where('IdTurista', $usuarioreservando->IdTurista)->orderBy('FechaReservacion','desc')->get();
        return view('home')
        ->with('imagenes',$imagenes)
        ->with('reservaciones',$reservaciones)
        ->with('paquetes',$paquetes);

    }catch(\Exception $e) {
      //si todavia no tiene informacion como turista
      $reservaciones=null;
      return view('home')
      ->with('imagenes',$imagenes)
      ->with('reservaciones',$reservaciones)
      ->with('paquetes',$paquetes);

    }
  }
}
