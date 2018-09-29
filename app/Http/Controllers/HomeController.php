<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Reservacion;
use App\Turista;
use App\User;
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

        $usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();
        $turistas =Turista::all();
        foreach ($turistas as $key => $turista) {
          if ($turista->IdPersona == $usuarioreservando->IdPersona) {
          $usuarioreservando=$turista->IdTurista;
            break;
          }
        }
        //Para que solo muestre las reservas del usuario actual por orden de fecha
        $reservaciones = Reservacion::where('IdTurista', $usuarioreservando)->orderBy('FechaReservacion','desc')->get();

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
