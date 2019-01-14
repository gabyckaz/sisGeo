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
use App\Pagadito; //API de Pagadito

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
      //dd($strAcompanantes);
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

    /**
     * Vista de Retorno de Pagadito
     * Método que se ejecuta al regresar de la interfaz desde la de Pagadito
     */
    public function recibo($token,$comprobante){
      /*
      * Este script recibe la redirección desde Pagadito una vez la transacción ha
      * sido finalizada. Se comunica con Pagadito a través de la API y consulta el estado de la transacción.
      *
      * LICENCIA: Éste código fuente es de uso libre. Su comercialización no está
      * permitida. Toda publicación o mención del mismo, debe ser referenciada a su autor original Pagadito.com.
      *
      * @author      Pagadito.com <soporte@pagadito.com>
      * @copyright   Copyright (c) 2017, Pagadito.com
      * @version     1.2
      * @link        https://dev.pagadito.com/index.php?mod=docs&hac=wspg
      */

      define("UID", "41e55e963384e7d3ae88485e94f1a6cb");
      define("WSK", "c051a71076455a950c870c27543b3783");
      define("WSPG", "https://sandbox.pagadito.com/comercios/wspg/charges.php?wdsl");
      define("AMBIENTE_SANDBOX",true);

      if (isset($token) && $token != "")
      {
          /* Lo primero es crear el objeto Pagadito, al que se le pasa como parámetros el UID y el WSK definidos en config.php */
          $Pagadito = new Pagadito(UID, WSK);
          /* Si se está realizando pruebas, necesita conectarse con Pagadito SandBox. Para ello llamamos
           * a la función mode_sandbox_on(). De lo contrario omitir la siguiente linea. */
          if (AMBIENTE_SANDBOX) {
              $Pagadito->mode_sandbox_on();
          }
          /* Validamos la conexión llamando a la función connect(). Retorna true si la conexión es exitosa. De lo contrario retorna false */
          if ($Pagadito->connect()) {
              /* Solicitamos el estado de la transacción llamando a la función get_status(). Le pasamos como parámetro el token recibido vía GET en nuestra URL de retorno. */
              if ($Pagadito->get_status($token)) {
                  /*Luego validamos el estado de la transacción, consultando el estado devuelto por la API. */
                  switch($Pagadito->get_rs_status())
                  {
                      case "COMPLETED":
                          /* Tratamiento para una transacción exitosa.*/
                          $msgPrincipal = "Su compra fue exitosa";
                          $nap=$Pagadito->get_rs_reference();
                          $fecharespuesta=$Pagadito->get_rs_date_trans();

                          //AQUI SERÍA DE AGREGAR EL INSERT EN COMPROBANTEPAGO
                          return view('Reservacion.invoice')
                            ->with('status',$msgPrincipal)
                            ->with('nap', $nap) //IDPAGO
                            ->with('fecharespuesta', $fecharespuesta);//fechapago
                          break;

                      case "REGISTERED":
                          /* Tratamiento para una transacción aún en proceso. */
                          $msgPrincipal = "Atenci&oacute;n";
                          $msgSecundario = "La transacci&oacute;n fue cancelada.<br /><br />";
                          break;

                      case "VERIFYING":
                          /*
                           * La transacción ha sido procesada en Pagadito, pero ha quedado en verificación.
                           * En este punto el cobro xha quedado en validación administrativa.
                           * Posteriormente, la transacción puede marcarse como válida o denegada;
                           * por lo que se debe monitorear mediante esta función hasta que su estado cambie a COMPLETED o REVOKED.
                           */
                          $msgPrincipal = "Atenci&oacute;n";
                          $msgSecundario = '
                          Su pago est&aacute; en validaci&oacute;n.<br />
                          NAP(N&uacute;mero de Aprobaci&oacute;n Pagadito): <label class="respuesta">' . $Pagadito->get_rs_reference() . '</label><br />
                          Fecha Respuesta: <label class="respuesta">' . $Pagadito->get_rs_date_trans() . '</label><br /><br />';
                          break;

                      case "REVOKED":
                          /*La transacción en estado VERIFYING ha sido denegada por Pagadito.
                           * En este punto el cobro ya ha sido cancelado.*/
                          $msgPrincipal = "Atenci&oacute;n";
                          $msgSecundario = "La transacci&oacute;n fue denegada.<br /><br />";
                          break;

                      case "FAILED":
                          /* Tratamiento para una transacción fallida.*/
                      default:
                          /* Por ser un ejemplo, se muestra un mensaje de error fijo.*/
                          $msgPrincipal = "Atenci&oacute;n";
                          $msgSecundario = "La transacci&oacute;n no fue realizada.<br /><br />";
                          break;
                  }
              } else {
                  /* En caso de fallar la petición, verificamos el error devuelto. */
                  switch($Pagadito->get_rs_code())
                  {
                      case "PG2001":
                          /*Incomplete data*/
                      case "PG3002":
                          /*Error*/
                      case "PG3003":
                          /*Unregistered transaction*/
                      default:
                          /** Por ser un ejemplo, se muestra un mensaje de error fijo. */
                          $msgPrincipal = "Error en la transacci&oacute;n";
                          $msgSecundario = "La transacci&oacute;n no fue completada.<br /><br />";
                          break;
                  }
              }
          } else {
              /* En caso de fallar la conexión, verificamos el error devuelto. */
              switch($Pagadito->get_rs_code())
              {
                  case "PG2001":
                      /*Incomplete data*/
                  case "PG3001":
                      /*Problem connection*/
                  case "PG3002":
                      /*Error*/
                  case "PG3003":
                      /*Unregistered transaction*/
                  case "PG3005":
                      /*Disabled connection*/
                  case "PG3006":
                      /*Exceeded*/
                  default:
                      /* Aqui se muestra el código y mensaje de la respuesta del WSPG */
                      $msgPrincipal = "Respuesta de Pagadito API";
                      $msgSecundario = "
                              COD: " . $Pagadito->get_rs_code() . "<br />
                              MSG: " . $Pagadito->get_rs_message() . "<br /><br />";
                      break;
              }
          }
      } else {
          /* Mensaje de error al no haber recibido el token por medio de la URL. */
          $msgPrincipal = "Atenci&oacute;n";
          $msgSecundario = "No se recibieron los datos correctamente.<br /> La transacci&oacute;n no fue completada.<br /><br />";
      }

    }

    /**
     * Método que implementa la API de Pagadito y/o PuntoExpress
     */
    public function cobro(Request $request)
    {
      /*
      * Este script procesa la transacción a petición del usuario
      * Se comunica con Pagadito a través de la API, para conectarse y procesar la transacción.
      *
      * LICENCIA: Éste código fuente es de uso libre. Su comercialización no está
      * permitida. Toda publicación o mención del mismo, debe ser referenciada a su autor original Pagadito.com.
      *
      * @author      Pagadito.com <soporte@pagadito.com>
      * @copyright   Copyright (c) 2017, Pagadito.com
      * @version     2.0
      * @link        https://dev.pagadito.com/index.php?mod=docs&hac=wspg
      */

      $desc=$request->descripcion;
      $cupos=$request->total;
      $cpersona=$request->cpersona;
      $IdUsuario=$request->usuario;
      $url=$request->url;
      $nombrecliente=$request->nombrecliente;
      $apellidocliente=$request->apellidocliente;
      $nombrecompleto=$nombrecliente. ' '. $apellidocliente;

      /* Se incluyen las constantes de conexión. */
       define("UID", "41e55e963384e7d3ae88485e94f1a6cb");
       define("WSK", "c051a71076455a950c870c27543b3783");
       define("WSPG", "https://sandbox.pagadito.com/comercios/wspg/charges.php?wdsl");
       define("AMBIENTE_SANDBOX",true);

       if (isset($cupos) && is_numeric($_POST["total"]))
       {
          /* Lo primero es crear el objeto nusoap_client, al que se le pasa como parámetro la URL de Conexión definida en la constante WSPG */
          $Pagadito = new Pagadito(UID, WSK);
          /* Si se está realizando pruebas, necesita conectarse con Pagadito SandBox. Para ello llamamos
          * a la función mode_sandbox_on(). De lo contrario omitir la siguiente linea. */
          if (AMBIENTE_SANDBOX) {
              $Pagadito->mode_sandbox_on();
          }
          /* Validamos la conexión llamando a la función connect(). */
          if ($Pagadito->connect()) {
              /* Luego pasamos a agregar el detalle de la venta */
             if ($cupos > 0) {
                 $Pagadito->add_detail($cupos, $desc, $cpersona, $url);
             }
             //Agregando campos personalizados de la transacción (se pueden agregar hasta 5)
             $Pagadito->set_custom_param("param1", $nombrecompleto);

             //Habilita la recepción de pagos preautorizados para la orden de cobro.
             $Pagadito->enable_pending_payments();

              /* Lo siguiente es ejecutar la transacción, enviandole el ern.
               * A manera de ejemplo el ern es generado como un número aleatorio entre 1000 y 2000. Lo ideal es que sea una
               * referencia almacenada por el Pagadito Comercio.
               */

             $ern = rand(1000, 2000);
              if (!$Pagadito->exec_trans($ern)) {
                  /*  En caso de fallar la transacción, verificamos el error devuelto. */
                  switch($Pagadito->get_rs_code())
                  {
                      case "PG2001":
                          /*Incomplete data*/
                      case "PG3002":
                          /*Error*/
                      case "PG3003":
                          /*Unregistered transaction*/
                      case "PG3004":
                          /*Match error*/
                      case "PG3005":
                          /*Disabled connection*/
                      default:
                          echo "
                              <SCRIPT>
                                  alert(\"".$Pagadito->get_rs_code().": ".$Pagadito->get_rs_message()."\");
                                  location.href = 'index.php';
                              </SCRIPT>
                          ";
                          break;
                  }
              }
          } else {
              /* En caso de fallar la conexión, verificamos el error devuelto. */
              switch($Pagadito->get_rs_code())
              {
                  case "PG2001":
                      /*Incomplete data*/
                  case "PG3001":
                      /*Problem connection*/
                  case "PG3002":
                      /*Error*/
                  case "PG3003":
                      /*Unregistered transaction*/
                  case "PG3005":
                      /*Disabled connection*/
                  case "PG3006":
                      /*Exceeded*/
                  default:
                      echo "
                          <SCRIPT>
                              alert(\"".$Pagadito->get_rs_code().": ".$Pagadito->get_rs_message()."\");
                              location.href = 'index.php';
                          </SCRIPT>
                      ";
                      break;
              }
          }

      return redirect()->back()->with('fallo', "Error");
       } else {
           // echo "
           //     <script>
           //         alert('No ha llenado los campos adecuadamente.');
           //         location.href = 'index.php';
           //     </script>
           // ";
           return redirect()->back()->with('fallo', "No ha llenado los campos adecuadamente");
       }

    }

}
