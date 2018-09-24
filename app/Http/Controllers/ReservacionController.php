<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservacion;
use App\Paquete;
use App\Turista;
use App\User;
use App\ImagenPaqueteTuristico;
use Carbon\Carbon;
use DB;

class ReservacionController extends Controller
{

      public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * Muestra historial de reservas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
      $usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();

      //Barriendo los turistas
      $turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      }
      //Trae las reservaciones hechas por el turista actual y las ordena de la mas reciente a la menos reciente
      $reservaciones = Reservacion::where('IdTurista', $usuarioreservando)->orderBy('FechaReservacion','desc')->get();
      return view('Reservacion.index')->with('reservaciones',$reservaciones);

     }catch(\Exception $e) {
       //si todavia no tiene informacion como turista
       $reservaciones=null;
       return view('Reservacion.index')->with('reservaciones',$reservaciones);
     }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
      $usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();

      //Barriendo los turistas
      $turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      }

          $this->validate($request,array(
            'idacompanantes' => 'required',
            'numeroacompanantes'=>'required',
          ));

         //Relacionando campo de BD con formulario
         //campo de BD -> campo del formulario

         $reservacion=new Reservacion;
         $reservacion->IdTurista=$usuarioreservando;
         $reservacion->IdPaquete=$request->idPaquete;
         $reservacion->FechaReservacion= Carbon::now();
         $reservacion->NumeroAcompanantes = $request->numeroacompanantes;
         $reservacion->IdsAcompanantes=$request->idacompanantes;
         $reservacion->ConfirmacionReservacion='0';

         $reservacion->save();


         //Redireccionando
         $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);
         $imagenes = ImagenPaqueteTuristico::all();
         $reservaciones=Reservacion::orderBy('FechaReservacion','desc')->paginate(5);

           return view('/home')
           ->with('reservaciones',$reservaciones)
           ->with('paquetes',$paquetes)
           ->with('imagenes',$imagenes)
           ->with('status', "Guardado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $reservacion = Reservacion::find($id);
      return view('Reservacion.edit', compact('reservacion'))->with('status', "Guardado con éxito");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,array(

        'idacompanantes' => 'required',
        'numeroacompanantes'=>'required',
         ));

       //guardar en la bd
       $reservacion = Reservacion::find($id);
       $reservacion->NumeroAcompanantes = $request->input('numeroacompanantes'); //si
       $reservacion->IdsAcompanantes=$request->input('idacompanantes');
       $reservacion->save();

       return redirect('/home')->with('status', "Guardado con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Boton reservar
     *
     */
    public function reservar($paquete)
    {
      //Obteniendo el turista actual

      // En forma de consulta:
      //$usuarioreservando = DB::table('users')->select('IdPersona')->where('IdPersona','=',auth()->user()->id)->get()->toArray();

      //en forma de consulta usando el modelo:
      $usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();

      //Barriendo los turistas
      $turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      }

      return view('Reservacion.create')
      ->with('paquete',$paquete)
      ->with('usuarioreservando',$usuarioreservando);
    }

    /**
     *
     *
     */
    public function showall()
    {
      //Obteniendo el turista actual

      //en forma de consulta usando el modelo:
      $usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();
      //Barriendo los turistas
      $turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      }

      return view('Reservacion.create')
      ->with('paquete',$paquete)
      ->with('usuarioreservando',$usuarioreservando);
    }
}
