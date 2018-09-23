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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservaciones=Reservacion::orderBy('FechaReservacion','desc')->paginate(5);
        return view('Reservacion.index')->with('reservaciones',$reservaciones);
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
         $reservacion->IdTurista=$usuarioreservando;//si
         $reservacion->IdPaquete=$request->idPaquete;//si
         $reservacion->FechaReservacion= Carbon::now(); //si
         $reservacion->NumeroAcompanantes = $request->numeroacompanantes; //si
         $reservacion->IdsAcompanantes=$request->idacompanantes;
         $reservacion->ConfirmacionReservacion='0';

         $reservacion->save();


         //Redireccionando
         $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);
         $imagenes = ImagenPaqueteTuristico::all();

           return view('/home')
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

       return redirect('/home')->with('status', "Gardado con éxito");
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
