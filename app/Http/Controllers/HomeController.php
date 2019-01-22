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
use App\Pago;

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
        //TO DO: Validar la fecha del paquete
        $reservaciones= DB::table('Pago')
          ->select('*')
          ->where([
            ['IdUsuario', '=', $usuarioreservando->IdTurista],
            ['Estado', '=', '1'],
           ])
          ->orderBy('FechaTransaccion','asc')
          ->limit(2)
          ->get();

        $pdisponibles = Paquete::all();
        $x=0;
        foreach ($pdisponibles as $p) {
          if ($p->compara_fechas==2 && $p->DisponibilidadPaquete==1 ) {
            $x++;
          }
        }
        $disponibles=$x;
        $pendientes = Paquete::where('AprobacionPaquete','=','0')->count();
        $clientes = User::where('EstadoUsuario','=','1')->count();
        $clientes_notificados = User::where('RecibirNotificacion','=','1')->count();

        return view('home')
        ->with('imagenes',$imagenes)
        ->with('reservaciones',$reservaciones)
        ->with('paquetes',$paquetes)
        ->with('disponibles',$disponibles)
        ->with('pendientes',$pendientes)
        ->with('clientes',$clientes)
        ->with('clientes_notificados',$clientes_notificados);

    }catch(\Exception $e) {
      //si todavia no tiene informacion como turista
      $clientes_notificados=null;
      $clientes=null;
      $disponibles=null;
      $reservaciones=null;
      $pendientes=null;
      return view('home')
      ->with('clientes_notificados',$clientes_notificados)
      ->with('clientes',$clientes)
      ->with('disponibles',$disponibles)
      ->with('pendientes',$pendientes)
      ->with('imagenes',$imagenes)
      ->with('reservaciones',$reservaciones)
      ->with('paquetes',$paquetes);

    }
  }
}
