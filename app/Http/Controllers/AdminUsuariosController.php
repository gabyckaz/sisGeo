<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Nacionalidad;
use App\Empleado;
use App\Persona;
use App\Turista;
use App\TipoDocumento;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminUsuariosController extends Controller
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
    public function index(Request $request)
    {
       //  $users = DB::table('users')->get();
       // return view('adminUser.index', compact('users'));

       // $usuarios=User::orderBy('name','asc')->paginate(6);
         //   return view('adminUser.index')->withUsuarios($usuarios);

       // return view('adminUser.index',compact('users'));
        /* $usuarios = User::inicial('x')->orderBy('id','asc')->paginate(2);
        if($request->get('fb') == "fbn"){
           $usuarios = User::nombre($request->get('nombre'))->orderBy('id','asc')->paginate(2);
            return view('adminUser.index', compact('usuarios'));
        }
        if($request->get('fb') == "fbe"){
           $usuarios = User::email($request->get('email'))->orderBy('id','asc')->paginate(2);
            return view('adminUser.index', compact('usuarios'));
        }
        if($request->get('fb') == "fbs"){
           $usuarios = User::estado($request->get('estado'))->orderBy('id','asc')->paginate(5);
            return view('adminUser.index', compact('usuarios'));
        } */

       // $usuarios = User::nombre($request->get('nombre'))->orderBy('id','asc')->paginate(2);// User::where('name', 'victor')

              //lleva el get cuando no tiene paginate $usuarios = User::nombre($request->get('nombre'))->get()
         //   $usuarios = User::nombre($request->get('nombre'))->orderBy('id','asc')->paginate(2);
       $usuarios = User::/*sortable()->*/
         nombre($request->get('nombre'))
       ->email($request->get('email'))
       ->estado($request->get('estado'))
       ->rol($request->get('rol'))
        ->orderBy('id','desc')->paginate(10);

       // $usuarios= User::sortable()->paginate(5);

        $estado = $request->get('estado');
        $rol = $request->get('rol');
        $email = $request->get('email');
        $nombre = $request->get('nombre');
       return view('adminUser.index', compact('usuarios','nombre','email','estado','rol'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$usuario = User::findOrFail($id);
        //return $usuario;
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
        $usuario = User::findOrFail($id);
        $roles = Role::All();
        return view("adminUser.edit",compact("usuario","roles"));//$usuario;

     // $var = 4;
    //  $data = DB::select('select proc_AgregarPais(?) ', [$var]  );
     // $data =DB::statement('SELECT proc_AgregarPais(?)', [$var]);
     // return $data;

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
        //
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

    public function eliminarRol(User $usuario, Request $request){

      try{
        $rol = Role::find($request->get('rol'));
        if ($usuario->hasRole($rol->name)) {
            $usuario->detachRole($rol);
            return redirect()->route('adminUser.index')->with('status', 'Eliminado el rol '.$rol->display_name .' al usuario '.$usuario->name);
        }
        return redirect()->route('adminUser.index')->with('fallo', 'El usuario '.$usuario->name.' no posee ese rol, no se eliminará');
     }catch(\Exception $e) {
      return redirect()->route('adminUser.index')->with('fallo', 'Error en la eliminación del rol, debe existir al menos 1 administrador');
     }
    }

    //Agregar rol
    public function agregarRol(User $usuario, Request $request){
      // $usuario = User::findOrFail($request->get('id'));
      // return $request->all();//$usuario;//$id;
     try{
        $rol = Role::find($request->get('rol'));
        $usuario->attachRole($rol);
        return redirect()->route('adminUser.index')->with('status', 'Agregado rol '.$rol->display_name .' al usuario '.$usuario->Persona->PrimerNombrePersona);
      } catch(\Exception $e) {
        return redirect()->route('adminUser.index')->with('fallo', 'El  usuario '.$usuario->name.' ya cuenta con el rol ' .$rol->display_name);
      }

    }

     public function cambiarEstado(User $usuario){
        if($usuario->EstadoUsuario === '0'){
        DB::table('users')->where('id', $usuario->id)->update([
            "EstadoUsuario" => '1',


        ]);
      return redirect()->route('adminUser.index')->with('status', 'Estado de '.$usuario->name.' modificado');
     }
        if(($usuario->EstadoUsuario === '1')){
           DB::table('users')->where('id', $usuario->id)->update([
            "EstadoUsuario" => '0',


        ]);
           return redirect()->route('adminUser.index');

         //  return "Hola mundo - ".$usuario->estado;
    }
  }

  public function crearGuiaTurisco()
    {
        $nacionalidad = nacionalidad::all();
        $sql = 'SELECT e."IdEmpleadoGEO", p."PrimerNombrePersona",p."PrimerApellidoPersona",
              p."AreaTelContacto", p."TelefonoContacto", n."Nacionalidad"
            FROM public."Empleado" as e, public."personas" as p, public."Turista" as t, public."Nacionalidad" as n
            WHERE e."IdPersona" = p."IdPersona" and t."IdPersona" = p."IdPersona" and t."IdNacionalidad" = n."IdNacionalidad" ;';
        $guias = DB::select($sql);
        $guias = $this->arrayPaginator($guias);

        return view("adminUser.crearGuiaTuristico", compact('nacionalidad','guias'));
    }

  public function almacenarGuiaTurisco(Request $request)
    {   
         $this->validate($request, [
          "Nombre" => "required|alpha|min:3|max:25",
          "apellido" => "required|alpha|min:3|max:25",
          "fechaNacimiento" => "required",
          "Direccion" => "required|min:10|max:100",
          "TelefonoContacto" => "required",
        ]); 
           
       
         $hoystr = Carbon::now()->format('d-m-Y');
         $hoyObj = Carbon::parse($hoystr);
         $fechaIngresadaObj = Carbon::parse($request->fechaNacimiento);
          if($fechaIngresadaObj >= $hoyObj ){
            return redirect()->back()->withInput()->with('ErrorFechaNac', 'Error fecha incorrecta');
          }
       $edad = Carbon::parse($request->fechaNacimiento)->age;

       if($edad < 18 ){
        return redirect()->back()->withInput()->with('ErrorFechaNac', 'Error fecha incorrecta');
       }
/* Arreglar Cuando arreglen la tabla  */     
      if($request->input("dui") == null && $request->input("pasaporte") == null){
            $hola1 = "Debes introducir por lo menos un documento";
       $this->validate($request, [
          "Nombre" => "required|alpha|min:3|max:25",
          "apellido" => "required|alpha|min:3|max:25",
          "fechaNacimiento" => "required|date",
          "Direccion" => "required|min:10|max:100",
          "dui" => "required",
          "pasaporte" => "required",
        ]);
     

      //return redirect()->back()->with('message', 'Necesitas Ingresar almenos un documento')->withInput();
        }elseif($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";
             $this->validate($request, [
            "Nombre" => "required|alpha|min:3|max:25",
            "apellido" => "required|alpha|min:3|max:25",
            "fechaNacimiento" => "required|date",
            "Direccion" => "required|min:10|max:100",
            "fechaVencimentoD" => "required",
            "fechaVencimentoP" => "required",
           ]);
             if(!$this->validaDui($request->dui)){
            return redirect()->back()->withInput()->with('Errordui', 'Numero de dui Incorrecto');
           }
           $hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaVencimientoIngresadaD = Carbon::parse($request->fechaVencimentoD);
           $fechaVencimientoIngresadaP = Carbon::parse($request->fechaVencimentoP);
          if($fechaVencimientoIngresadaD <= $hoyObj ){
            return redirect()->back()->withInput()->with('ErrorFechaVenceD', 'Error fecha de vencimiento');
          }
          if($fechaVencimientoIngresadaP <= $hoyObj){
            return redirect()->back()->withInput()->with('ErrorFechaVenceP', 'Error fecha de vencimiento');
          }
           
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "apellido" => "required|alpha|min:3|max:25",
              "fechaNacimiento" => "required|date",
              "Direccion" => "required|min:10|max:100",
              "fechaVencimentoD" => "required",
           ]);
           if(!$this->validaDui($request->dui)){
            return redirect()->back()->withInput()->with('Errordui', 'Numero de dui Incorrecto');
           }
           $hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaVencimientoIngresadaD = Carbon::parse($request->fechaVencimentoD);
          if($fechaVencimientoIngresadaD <= $hoyObj ){
            return redirect()->back()->withInput()->with('ErrorFechaVenceD', 'Error fecha de vencimiento');
          }

         
        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";
           
            $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "apellido" => "required|alpha|min:3|max:25",
              "fechaNacimiento" => "required|date",
              "Direccion" => "required|min:10|max:100",
              "fechaVencimentoP" => "required",
           ]);
           $hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaVencimientoIngresadaP = Carbon::parse($request->fechaVencimentoP);
          if($fechaVencimientoIngresadaP <= $hoyObj){
            return redirect()->back()->withInput()->with('ErrorFechaVenceP', 'Error fecha de vencimiento');
            }
          
        }

      $persona = Persona::create([
            "PrimerNombrePersona" => $request->Nombre,
            "SegundoNombrePersona" => $request->segundoNombre,
            "PrimerApellidoPersona" => $request->apellido,
            "SegundoApellidoPersona" => $request->segundoApellido,
            "Genero" => $request->genero,
            "AreaTelContacto"=> $request->AreaTelContacto,
            "TelefonoContacto" => $request->TelefonoContacto,

         ]);
            $turista = Turista::create([
              'IdNacionalidad'=> $request->nacionalidad,
              'IdPersona' => $persona->IdPersona,
              "FechaNacimiento" => $request->fechaNacimiento,
              "CategoriaTurista"  => 'A',
              "DomicilioTurista" => $request->Direccion,
              "Problemas_Salud" => "ninguno",
        ]);

        if($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";
            $documentoDui = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "DUI",
            "NumeroDocumento" => $request->dui,
            "FechaVenceDocumento" => $request->fechaVencimentoD,
         ]);
        $documentoPasaporte = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "Pasaporte",
            "NumeroDocumento" => $request->pasaporte,
            "FechaVenceDocumento" => $request->fechaVencimentoP,
         ]);
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           $documentoDui = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "DUI",
            "NumeroDocumento" => $request->dui,
            "FechaVenceDocumento" => $request->fechaVencimentoD,
         ]);

        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";
            $documentoPasaporte = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "Pasaporte",
            "NumeroDocumento" => $request->pasaporte,
            "FechaVenceDocumento" => $request->fechaVencimentoP,
         ]);
        }

        $empleado=new Empleado;
       $empleado->IdPersona = $persona->IdPersona; 
       $empleado->save();
        return redirect()->route('admin.agregar.guiaTuristico')->with('message',' Agregado con éxito');
    
    }
    public function editarInformacionGuia($id){
       $nacionalidad = Nacionalidad::all(); 
      $sql = 'SELECT e."IdEmpleadoGEO", e."IdPersona", p."PrimerNombrePersona", p."SegundoNombrePersona",
              p."PrimerApellidoPersona", p."SegundoApellidoPersona", p."Genero", p."AreaTelContacto",
              p."TelefonoContacto", n."Nacionalidad", t."FechaNacimiento", t."DomicilioTurista" , t."IdTurista", n."IdNacionalidad"
              FROM public."Empleado" as e , public."personas" as p, public."Turista" as t, public."Nacionalidad" as n
              WHERE e."IdEmpleadoGEO" = '.$id.' AND e."IdPersona" = p."IdPersona" AND p."IdPersona" = t."IdPersona" AND n."IdNacionalidad" = t."IdNacionalidad";';
      $guia = DB::select($sql);
       $documentos="";
       $turista = Turista::find($guia[0]->IdTurista);
        if($turista->documentos->count() == 2){
            $documentos = "duiPasaporte";
        }else{
          foreach ($turista->documentos as $documento) {

             if($documento->TipoDocumento=="DUI"){
                $documentos= "dui";
                break;
                }
            if($documento->TipoDocumento=="Pasaporte"){
                $documentos= "pasaporte";
                break;
            }
           }
         }
       return view('adminUser.editarGuiaTuristico', compact('turista','documentos','nacionalidad','guia'));
    }
    
    public function guardarInformacionGuiaEditado(Request $request){

      $this->validate($request, [
          "Nombre" => "required|alpha|min:3|max:25",          
          "Apellido" => "required|alpha|min:3|max:25",          
          "fechaNacimiento" => "required",
          "Direccion" => "required|min:10|max:100",
          "TelefonoContacto" => "required",
        ]); 

        if($request->input("dui") == null && $request->input("pasaporte") == null){
            $hola1 = "Debes introducir por lo menos un documento";
       $this->validate($request, [
          "Nombre" => "required|alpha|min:3|max:25",
          "Apellido" => "required|alpha|min:3|max:25",
          "fechaNacimiento" => "required|date",
          "Direccion" => "required|min:10|max:100",
          "dui" => "required",
          "pasaporte" => "required",
        ]);
     

      //return redirect()->back()->with('message', 'Necesitas Ingresar almenos un documento')->withInput();
        }elseif($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";
             $this->validate($request, [
            "Nombre" => "required|alpha|min:3|max:25",
            "Apellido" => "required|alpha|min:3|max:25",
            "fechaNacimiento" => "required|date",
            "Direccion" => "required|min:10|max:100",
            "fechaVencimentoD" => "required",
            "fechaVencimentoP" => "required",
           ]);
             if(!$this->validaDui($request->dui)){
            return redirect()->back()->withInput()->with('Errordui', 'Numero de dui Incorrecto');
           }
           $hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaVencimientoIngresadaD = Carbon::parse($request->fechaVencimentoD);
           $fechaVencimientoIngresadaP = Carbon::parse($request->fechaVencimentoP);
          if($fechaVencimientoIngresadaD <= $hoyObj ){
            return redirect()->back()->withInput()->with('ErrorFechaVenceD', 'Error fecha de vencimiento');
          }
          if($fechaVencimientoIngresadaP <= $hoyObj){
            return redirect()->back()->withInput()->with('ErrorFechaVenceP', 'Error fecha de vencimiento');
          }
           
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "fechaNacimiento" => "required|date",
              "Direccion" => "required|min:10|max:100",
              "fechaVencimentoD" => "required",
           ]);
           if(!$this->validaDui($request->dui)){
            return redirect()->back()->withInput()->with('Errordui', 'Numero de dui Incorrecto');
           }
           $hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaVencimientoIngresadaD = Carbon::parse($request->fechaVencimentoD);
          if($fechaVencimientoIngresadaD <= $hoyObj ){
            return redirect()->back()->withInput()->with('ErrorFechaVenceD', 'Error fecha de vencimiento');
          }

         
        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";
           
            $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "fechaNacimiento" => "required|date",
              "Direccion" => "required|min:10|max:100",
              "fechaVencimentoP" => "required",
           ]);
           $hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaVencimientoIngresadaP = Carbon::parse($request->fechaVencimentoP);
          if($fechaVencimientoIngresadaP <= $hoyObj){
            return redirect()->back()->withInput()->with('ErrorFechaVenceP', 'Error fecha de vencimiento');
            }
          
        }

          $turista = Turista::find($request->idTurista);          
       //Actualizo a la persona
          $persona = Persona::find($turista->IdPersona);
          $persona->PrimerNombrePersona = $request->Nombre;
          $persona->SegundoNombrePersona = $request->SegundoNombre;
          $persona->PrimerApellidoPersona = $request->Apellido;
          $persona->SegundoApellidoPersona = $request->SegundoApellido;
          $persona->AreaTelContacto = $request->AreaTelContacto;
          $persona->TelefonoContacto = $request->TelefonoContacto;
          $persona->save();

          $turista->DomicilioTurista = $request->Direccion;
          $turista->save();
      
          if($request->input("dui") != null && $request->input("fechaVencimentoD") != null){
           $dui = TipoDocumento::where('TipoDocumento','DUI')
            ->where('IdTurista',$turista->IdTurista)->first();
            if($dui == null){
              $dui = TipoDocumento::create([
                "IdTurista" => $turista->IdTurista,
                "TipoDocumento" => "DUI",
                "NumeroDocumento" => $request->dui,
                "FechaVenceDocumento" => $request->fechaVencimentoD,
             ]);
            }else{
            $dui->FechaVenceDocumento = $request->fechaVencimentoD;
            $dui->save();
            }
         }
        
         if($request->input("pasaporte") != null && $request->input("fechaVencimentoP") != null){ 
            $pasaporte = TipoDocumento::where('TipoDocumento','Pasaporte')
            ->where('IdTurista',$turista->IdTurista)->first();
            if($pasaporte == null){
                $pasaporte = TipoDocumento::create([
                "IdTurista" => $turista->IdTurista,
                "TipoDocumento" => "Pasaporte",
                "NumeroDocumento" => $request->pasaporte,
                "FechaVenceDocumento" => $request->fechaVencimentoP,
         ]);

            }else{
            $pasaporte->FechaVenceDocumento = $request->fechaVencimentoP;
            $pasaporte->save();
            }

          }
      return redirect()->route('admin.agregar.guiaTuristico')->with('message',' Informacion actualizada con éxito');
    }

      public function arrayPaginator($array)
{
    $page = Input::get('page', 1);
    $perPage = 10;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => 'agregarGuiaTuristico']);
}

     public function validaDui($dui){  
      $separador ='-';
      $partesDui = explode('-', $dui);
      $numeroDui = $partesDui[0];
      $digitoVerificador = $partesDui[1];
      $arrayNumeroDui = str_split($numeroDui);  
      $suma = (9*$arrayNumeroDui[0])+(8*$arrayNumeroDui[1])+(7*$arrayNumeroDui[2])+(6*$arrayNumeroDui[3])+(5*$arrayNumeroDui[4])+(4*$arrayNumeroDui[5])+(3*$arrayNumeroDui[6])+(2*$arrayNumeroDui[7]);
      $moduloDiv = $suma%10;
      $resta = 10-$moduloDiv;
      if($resta == 0 || $resta == $digitoVerificador || $moduloDiv == 0){
        return true;
      }
      return false;
 }

}
