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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);
      $imagenes = ImagenPaqueteTuristico::all();
      //$reservaciones = Reservacion::orderBy('IdReservacion','desc')->paginate(6);

      $usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();
      $turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      }

      $reservaciones = Reservacion::where('IdTurista', $usuarioreservando)->get();

      return view('home')
      ->with('imagenes',$imagenes)
      ->with('reservaciones',$reservaciones)
      ->with('paquetes',$paquetes);

    }
}
