<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservacion;
use App\Paquete;
use App\Turista;
use App\Persona;
use App\User;
use App\ImagenPaqueteTuristico;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;

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
      /*$usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();

      //Barriendo los turistas
      $turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      }
      //Trae las reservaciones hechas por el turista actual y las ordena de la mas reciente a la menos reciente
      $reservaciones = Reservacion::where('IdTurista', $usuarioreservando)->orderBy('FechaReservacion','desc')->get();*/
       $sql = 'SELECT t.IdTurista
          FROM users as u, personas as p, Turista as t
          WHERE u.IdPersona = p.IdPersona AND p.IdPersona = t.IdPersona
          AND u.id = '.auth()->user()->id.';';

        $usuarioreservando = DB::select($sql);
        $reservaciones = Reservacion::where('IdTurista', $usuarioreservando[0]->IdTurista)->orderBy('FechaReservacion','desc')->get();
      //  dd($reservaciones[0]->paquete->compara_fechas);

      return view('Reservacion.index', compact('reservaciones'));

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
      $strAcompanantes = '';
      if($request->input("usuario") == null && $request->strFamilia == null && $request->strAmigos == null){
      //  dd('No trae idTurista de usuario y strFamilia es nulo y strAmigos es Null')
        return redirect()->route('adminPaquete.reserva.add',$request->IdPaquete)->with('message','No has reservado para nadie');
      }elseif($request->input("usuario") != null && $request->strFamilia == null && $request->strAmigos == null){//solo el usuario
        $strAcompanantes = $request->input("usuario");
        //dd('solo va el usuario: '.$strAcompanantes);
      }elseif($request->input("usuario") != null && $request->strFamilia != null && $request->strAmigos == null){//El usuario y la familia
        $strAcompanantes = $request->input("usuario").",".$request->strFamilia;
        $strAcompanantes = $this->ordenadorAscendente($strAcompanantes);
        //dd('va el usuario y su familia: '.$strAcompanantes);
      }elseif($request->input("usuario") != null && $request->strFamilia == null && $request->strAmigos != null){//El usuario y los amigos
        $strAcompanantes = $request->input("usuario").",".$request->strAmigos;
        $strAcompanantes = $this->ordenadorAscendente($strAcompanantes);
        //dd('va el usuario y sus amigos: '.$strAcompanantes);
      }elseif($request->input("usuario") == null && $request->strFamilia != null && $request->strAmigos == null){//Solo la familia
        $strAcompanantes  = $request->strFamilia;
        $strAcompanantes = $this->ordenadorAscendente($strAcompanantes);
        //dd('solo va la familia: '.$strAcompanantes);
      }elseif($request->input("usuario") == null && $request->strFamilia == null && $request->strAmigos != null){//Solo los amigos
        $strAcompanantes = $request->strAmigos;
        $strAcompanantes = $this->ordenadorAscendente($strAcompanantes);
        //dd('solo van los amigos: '.$strAcompanantes);
      }elseif($request->input("usuario") == null && $request->strFamilia != null && $request->strAmigos != null){//Solo la familia y los amigos
        $strAcompanantes = $request->strFamilia.",".$request->strAmigos;
        $strAcompanantes = $this->ordenadorAscendente($strAcompanantes);
        //dd('solo la familia y los amigos: '.$strAcompanantes);
      }elseif($request->input("usuario") != null && $request->strFamilia != null && $request->strAmigos != null){//El usuario la familia y amigos
        $strAcompanantes  = $request->input("usuario").",".$request->strFamilia.",".$request->strAmigos;
        $strAcompanantes = $this->ordenadorAscendente($strAcompanantes);
        //dd($strAcompanantes);
      }
      dd($strAcompanantes);
      $sql = 'SELECT t.IdTurista
          FROM users as u, personas as p, Turista as t
          WHERE u.IdPersona = p.IdPersona AND p.IdPersona = t.IdPersona
          AND u.id = '.auth()->user()->id.';';

          $usuarioreservando = DB::select($sql);
          $strAcompanantes = $usuarioreservando[0]->IdTurista.'-'.$strAcompanantes;


         $reservacion=new Reservacion;
         $reservacion->IdTurista=$usuarioreservando[0]->IdTurista;
         $reservacion->IdPaquete=$request->idPaquete->IdPaquete;
         $reservacion->FechaReservacion= Carbon::now();
         $reservacion->NumeroAcompanantes = $request->total;
         $reservacion->IdsAcompanantes=$strAcompanantes;
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

    public function ordenadorAscendente($cadena)
    {
      $separador =',';
      $strAcompanantes = explode(',', $cadena);
      sort($strAcompanantes);
      $cadenaOrdenada = implode ( $separador , $strAcompanantes );
      return $cadenaOrdenada;
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
      $strAcompanantes = explode('-', $reservacion->IdsAcompanantes);
      $arryIdsAcompanantes = explode(',', $strAcompanantes[1]);
      $realizaReserva = $strAcompanantes[0];
      $encargado = Persona::find(auth()->user()->IdPersona);
       $sql1 = 'SELECT  a.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido,p.Genero
          FROM Acompanante as a, Turista as t,
          personas as p,Nacionalidad as n
          WHERE a.IdTurista = t.IdTurista and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          a.IdUsuario = '.auth()->user()->id.'';
          // AND a.IdTurista in('.$strAcompanantes[1].')';

      $sql2= 'SELECT   t.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido,p.Genero
          FROM users as u, Turista as t,
          personas as p
          WHERE u.IdPersona = p.IdPersona and
          t.IdPersona=p.IdPersona and
          u.id = '.auth()->user()->id.';';
      $sql = $sql1.' UNION '.$sql2;
      $acompanantesT = DB::select($sql);
       //   dd($acompanantes);
      /*$users = DB::table('Turista')
                    ->whereIn('IdTurista', $arryIdsAcompanantes)
                    ->get();
      dd($users);*/
      return view('Reservacion.edit', compact('reservacion','acompanantesT','arryIdsAcompanantes','encargado','realizaReserva'))->with('status', "Guardado con éxito");
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
      //dd($id);
      $strAcompanantes = implode(',', $request->ids);
      $idacompanantes= $this->ordenadorAscendente($strAcompanantes);
      dd($idacompanantes);
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
      /*Consulta para obtener el Id turista del usuario*/
     $sqlUserTurista = 'SELECT   t.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido
          FROM users as u, Turista as t,
          personas as p
          WHERE u.IdPersona = p.IdPersona and
          t.IdPersona=p.IdPersona and
          u.id = '.auth()->user()->id.';';
          $userTurista = DB::select($sqlUserTurista);
      /*Consulta para obtener los Ids de los amigos del usuario*/
      $sqlAmigos = 'SELECT  a.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido,a.EsFamiliar as Tipo,p.Genero
          FROM Acompanante as a, Turista as t,
          personas as p,Nacionalidad as n
          WHERE a.IdTurista = t.IdTurista and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          a.IdUsuario = '.auth()->user()->id.' AND a.EsFamiliar = \'A\';';
          $amigos = DB::select($sqlAmigos);
      /*Consulta para obtener los Ids de la familia del usuario*/

      $sqlFamilia = 'SELECT  a.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido,a.EsFamiliar as Tipo,p.Genero
          FROM Acompanante as a, Turista as t,
          personas as p,Nacionalidad as n
          WHERE a.IdTurista = t.IdTurista and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          a.IdUsuario = '.auth()->user()->id.' AND a.EsFamiliar = \'F\';';
          $familia = DB::select($sqlFamilia);

       $paquete = Paquete::find($paquete);

      //Obteniendo el turista actual

      // En forma de consulta:
      //$usuarioreservando = DB::table('users')->select('IdPersona')->where('IdPersona','=',auth()->user()->id)->get()->toArray();

      //en forma de consulta usando el modelo:
      //$usuarioreservando= User::where('IdPersona','=',auth()->user()->id)->first();

      //Barriendo los turistas
      /*$turistas =Turista::all();
      foreach ($turistas as $key => $turista) {
        if ($turista->IdPersona == $usuarioreservando->IdPersona) {
        $usuarioreservando=$turista->IdTurista;
          break;
        }
      } */
      $sql = 'SELECT t.IdTurista
          FROM users as u, personas as p, Turista as t
          WHERE u.IdPersona = p.IdPersona AND p.IdPersona = t.IdPersona
          AND u.id = '.auth()->user()->id.';';

        $usuarioreservando = DB::select($sql);

      return view('Reservacion.create', compact('paquete','usuarioreservando','userTurista','amigos','familia'));
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
