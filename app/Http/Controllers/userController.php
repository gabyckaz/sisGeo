<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Nacionalidad;
use App\Persona;
use App\Turista;
use App\TipoDocumento;
use App\Acompanante;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Paginator;
//use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;



class userController extends Controller
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
        //
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

        //
        if(auth()->user()->id ==  $id){
        $usuario = User::findOrFail($id);
        return view('user.edit', compact('usuario'));
    }else{

        return redirect()->route('home')->with('info','Este no es tu Usuario');;
    }
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
         $this->validate($request, [
            'avatar' => 'image',

        ]);
        if( auth()->user()->id == $id){
        if( $request->hasFile('avatar')){

       if(auth()->user()->avatar != 'default.gif'){
         Storage::delete(auth()->user()->avatar);
       }
        DB::table('users')->where('id', $id)->update([

            "avatar" => $request->file('avatar')->store('public'),

        ]);
        }


            DB::table('users')->where('id', $id)->update([

            "RecibirNotificacion" => $request->input('RecibirNotificacion'),
            "updated_at" => Carbon::now(),

        ]);

          DB::table('personas')->where('IdPersona', $id)->update([

            "PrimerNombrePersona" => $request->input('PrimerNombrePersona'),
            "SegundoNombrePersona" => $request->input('SegundoNombrePersona'),
            "PrimerApellidoPersona" => $request->input('PrimerApellidoPersona'),
            "SegundoApellidoPersona" => $request->input('SegundoApellidoPersona'),
            "AreaTelContacto" => $request->input('AreaTelContacto'),
            "TelefonoContacto" => $request->input('TelefonoContacto'),
            "updated_at" => Carbon::now(),

        ]);
          return redirect()->route('home');//view('home');
    } return "Este no es tu usuario";

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
	public function editarInformacion()
    {
        $existeturista ="";
        //$t = DB::table('Turista')->where('IdPersona', auth()->user()->IdPersona)->first();
        //$t = Turista::find(auth()->user()->IdPersona); //--> arreglar esto xq no me esta buscando el turista con id de turista
        $turista = Turista::where('IdPersona',auth()->user()->IdPersona)->first();
        //$documento = TipoDocumento::where('IdTurista',$t->IdTurista);
        //$d = TipoDocumento::find(1)->get();
        //dd($d);
        $documentos="";
        if($turista == null){
         $existeTurista = "no";
        }else{
         $existeTurista = "si";
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
        }
        $usuario = User::findOrFail(auth()->user()->id);
        $nacionalidad = Nacionalidad::all();


        return view('user.completarInformacionUsuario', compact('usuario','nacionalidad' ,'existeTurista','turista','documentos'));
    }

     public function completarInformacion(Request $request)
    {
        $documentos = "";
        $existeTurista ="";
        
        if( $request->input("dui") == null && $request->input("pasaporte") == null){
            $hola1 = "Debes introducir por lo menos un documento";            
            return redirect()->back()->with('message', 'Necesitas Ingresar almenos un documento')->withInput();
        }elseif($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";            
             $this->validate($request, [
             "fechaVencimientoD" => "required",
             "fechaVencimientoP" => "required",
           ]);
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           
           $this->validate($request, [
             "fechaVencimientoD" => "required",
           ]);
           
        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";            
            $this->validate($request, [
             "fechaVencimientoP" => "required",
           ]);
        }
         
        $this->validate($request, [
              "PrimerNombrePersona" => "required|alpha|min:2|max:25",
              "PrimerApellidoPersona" => "required|alpha|min:2|max:25",
              "TelefonoContacto" => "required",
              "fechaNacimiento" => "required",
        ]);
        
         $existeTurista ="";
         $turista = Turista::where('IdPersona',auth()->user()->IdPersona)->first();
         
        if($turista == null){
         $existeTurista = "no";
         //Actualizo elusuario
        if( $request->hasFile('avatar')){
           $this->validate($request, [
            'avatar' => 'image',
            ]);
         if(auth()->user()->avatar != 'default.gif'){
          Storage::delete(auth()->user()->avatar);
         }
          DB::table('users')->where('id', auth()->user()->id)->update([

            "avatar" => $request->file('avatar')->store('public'),

        ]);
        }
          $usuario = User::find(auth()->user()->id);
          $usuario->name = $request->PrimerNombrePersona;
          $usuario->save();

        //Actualizo a la persona
          $persona = Persona::find(auth()->user()->IdPersona)->first();
          $persona->PrimerNombrePersona = $request->PrimerNombrePersona;
          $persona->SegundoNombrePersona = $request->SegundoNombrePersona;
          $persona->PrimerApellidoPersona = $request->PrimerApellidoPersona;
          $persona->SegundoApellidoPersona = $request->SegundoApellidoPersona;
          $persona->AreaTelContacto = $request->AreaTelContacto;
          $persona->TelefonoContacto = $request->TelefonoContacto;
          $persona->save();

         //no existe turista entonces lo creo
         $t = Turista::create([
              'IdNacionalidad'=> $request->nacionalidad,
              'IdPersona' => auth()->user()->IdPersona,
              "FechaNacimiento" => $request->fechaNacimiento,
              "CategoriaTurista"  => 'A',
              "DomicilioTurista" => $request->direccion,
              "Problemas_Salud" => $request->psalud,
        ]);

         if($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";
            $documentoDui = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "DUI",
            "NumeroDocumento" => $request->dui,
            "FechaVenceDocumento" => $request->fechaVencimientoD,
         ]);
        $documentoPasaporte = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "Pasaporte",
            "NumeroDocumento" => $request->pasaporte,
            "FechaVenceDocumento" => $request->fechaVencimientoP,
         ]);
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           $documentoDui = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "DUI",
            "NumeroDocumento" => $request->dui,
            "FechaVenceDocumento" => $request->fechaVencimientoD,
         ]);

        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";
            $documentoPasaporte = TipoDocumento::create([
            "IdTurista" => $turista->IdTurista,
            "TipoDocumento" => "Pasaporte",
            "NumeroDocumento" => $request->pasaporte,
            "FechaVenceDocumento" => $request->fechaVencimientoP,
         ]);
        }
        $documentos="";
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
        $nacionalidad = Nacionalidad::all();
        $existeTurista = "si";
        return view('user.completarInformacionUsuario', compact('usuario','nacionalidad' ,'existeTurista','turista','documentos'))->with('message','Usuario Creado');;
        }else{
         $existeTurista = "si";
         //Actualizo el usuario
          if( $request->hasFile('avatar')){
           $this->validate($request, [
            'avatar' => 'image',
            ]);
         if(auth()->user()->avatar != 'default.gif'){
          Storage::delete(auth()->user()->avatar);
         }
          DB::table('users')->where('id', auth()->user()->id)->update([

            "avatar" => $request->file('avatar')->store('public'),

         ]);
        }
          $usuario = User::find(auth()->user()->id);
          $usuario->name = $request->PrimerNombrePersona;
          $usuario->RecibirNotificacion = $request->RecibirNotificacion;
          $usuario->save();

        //Actualizo a la persona
          $persona = Persona::find(auth()->user()->IdPersona);
          $persona->PrimerNombrePersona = $request->PrimerNombrePersona;
          $persona->SegundoNombrePersona = $request->SegundoNombrePersona;
          $persona->PrimerApellidoPersona = $request->PrimerApellidoPersona;
          $persona->SegundoApellidoPersona = $request->SegundoApellidoPersona;
          $persona->AreaTelContacto = $request->AreaTelContacto;
          $persona->TelefonoContacto = $request->TelefonoContacto;
          $persona->save();

        //Actualizo al turista
          $turista->IdNacionalidad = $request->nacionalidad;
          $turista->IdPersona = $persona->IdPersona;
        //$t->CategoriaTurista = $request->;
          $turista->FechaNacimiento = $request->fechaNacimiento;
          $turista->DomicilioTurista = $request->direccion;
          $turista->Problemas_Salud = $request->psalud;
          $turista->save();

        //Actualizo documentos o los creo si no existen
         if($request->input("dui") != null && $request->input("fechaVencimientoD") != null){
           $dui = TipoDocumento::where('TipoDocumento','DUI')
            ->where('IdTurista',$turista->IdTurista)->first();
            if($dui == null){
              $dui = TipoDocumento::create([
                "IdTurista" => $turista->IdTurista,
                "TipoDocumento" => "DUI",
                "NumeroDocumento" => $request->dui,
                "FechaVenceDocumento" => $request->fechaVencimientoD,
             ]);
            }else{
            $dui->FechaVenceDocumento = $request->fechaVencimientoD;
            $dui->save();
            }
         }

          if($request->input("pasaporte") != null && $request->input("fechaVencimientoP") != null){
            $pasaporte = TipoDocumento::where('TipoDocumento','Pasaporte')
            ->where('IdTurista',$turista->IdTurista)->first();
            if($pasaporte == null){
                $pasaporte = TipoDocumento::create([
                "IdTurista" => $turista->IdTurista,
                "TipoDocumento" => "Pasaporte",
                "NumeroDocumento" => $request->pasaporte,
                "FechaVenceDocumento" => $request->fechaVencimientoP,
         ]);

            }else{
            $pasaporte->FechaVenceDocumento = $request->fechaVencimientoP;
            $pasaporte->save();
            }

          }
        $documentos="";
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

        }

       // $usuario = User::findOrFail(auth()->user()->id);
        $nacionalidad = Nacionalidad::all();

      // return view('user.completarInfoUserTurista', compact('usuario','nacionalidad' ,'existe'));
      return redirect()->route('usuario.completar.informacion',compact('usuario','nacionalidad' ,'existeTurista','documentos'))->with('message','Informacion Actualizada');

    }

    public function editInfoUserTurista($id){
       // $id =  Crypt::decrypt($id);

        $turista = DB::table('Turista')->where('IdPersona', auth()->user()->IdPersona)->first();
        $nacionalidad = Nacionalidad::all();

        return view('user.editInfoUserTurista', compact('turista', 'nacionalidad'));
    }

    public function agregarFamiliarAmigo(Request $request)
    {
        
       // $usuario = User::findOrFail(auth()->user()->id);
        $nacionalidad = Nacionalidad::all();

         $familiaAmigos = DB::select('
           (SELECT  a."IdUsuario",a."IdFamiliarAmigo",a."IdTurista",a."EsFamiliar",
          p."PrimerNombrePersona",p."PrimerApellidoPersona",p."Genero",
          n."Nacionalidad",t."FechaNacimiento", t."DomicilioTurista",
          t."Problemas_Salud"
          FROM public."Acompanante" as a, public."Turista" as t,
          public."personas" as p,public."Nacionalidad" as n
          WHERE a."IdTurista" = t."IdTurista" and
          t."IdPersona"=p."IdPersona" and t."IdNacionalidad" = n."IdNacionalidad" and
          a."IdUsuario" = '.auth()->user()->id.' )
        UNION
          (SELECT  u."id",(0) as "IdFamiliarAmigo", t."IdTurista",('."'af'".') as "EsFamiliar",
          p."PrimerNombrePersona",p."PrimerApellidoPersona",p."Genero",
          n."Nacionalidad",t."FechaNacimiento", t."DomicilioTurista",
          t."Problemas_Salud"
          FROM public."users" as u, public."Turista" as t,
          public."personas" as p,public."Nacionalidad" as n
          WHERE u."IdPersona" = p."IdPersona" and
          t."IdPersona"=p."IdPersona" and t."IdNacionalidad" = n."IdNacionalidad" and
          u."id" = '.auth()->user()->id.' )
          ');

        $familiaAmigos = $this->arrayPaginator($familiaAmigos);
        return view('user.agregarFamiliaAmigo', compact('nacionalidad','familiaAmigos'));

    }

    public function arrayPaginator($array)
{
    $page = Input::get('page', 1);
    $perPage = 5;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => 'agregarFamiliarAmigo']);
}


    public function guardarFamiliarAmigo(Request $request){
    
       $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:6|max:25",
              "fechaNacimiento" => "required|date",
              "Direccion" => "required|min:10|max:100",
        ]);
         
      if( $request->input("dui") == null && $request->input("pasaporte") == null){
            $hola1 = "Debes introducir por lo menos un documento";

       $this->validate($request, [
              "dui" => "required",
              "pasaporte" => "required",

        ]);

      //return redirect()->back()->with('message', 'Necesitas Ingresar almenos un documento')->withInput();
        }elseif($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";
             $this->validate($request, [
             "fechaVencimentoD" => "required",
             "fechaVencimentoP" => "required",
           ]);
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           $this->validate($request, [
             "fechaVencimentoD" => "required",
           ]);
        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";
            $this->validate($request, [
             "fechaVencimentoP" => "required",
           ]);
        }

      
      $persona = Persona::create([
            "PrimerNombrePersona" => $request->Nombre,
            "PrimerApellidoPersona" => $request->Apellido,
            "Genero" => $request->genero,
            "AreaTelContacto"=>'503',
            "TelefonoContacto" => '76788859',

         ]);
      $turista = Turista::create([
              'IdNacionalidad'=> $request->nacionalidad,
              'IdPersona' => $persona->IdPersona,
              "FechaNacimiento" => $request->fechaNacimiento,
              "CategoriaTurista"  => 'A',
              "DomicilioTurista" => $request->Direccion,
              "Problemas_Salud" => $request->psalud,
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

         $familiarAmigo = Acompanante::create([
          'IdTurista' => $turista->IdTurista,
          'IdUsuario' => auth()->user()->id,
          'EsFamiliar' => $request->tipo,
         ]);

      return redirect()->route('user.agregar.familiarAmigo')->with('message',' Agregado con éxito');;
    }

   public function editarInformacionFamiliarAmigo($idTurista){
        $nacionalidad = Nacionalidad::all(); 
       $sql = 'SELECT "IdFamiliarAmigo", "IdTurista", "IdUsuario", "EsFamiliar"
                FROM public."Acompanante"
                WHERE "IdUsuario" = '.auth()->user()->id.' AND "IdTurista" = '.$idTurista.';';
       $resultado= DB::select($sql);
       if($resultado == null){
         return redirect()->route('user.agregar.familiarAmigo')->with('message', 'No encontrado');
       }

       $turista = Turista::find($idTurista );
        $sqltipo = 'SELECT "EsFamiliar"
                    FROM public."Acompanante"
                    WHERE "IdTurista" = '.$turista->IdTurista.';';
        $tipo = DB::select($sqltipo);
        $tipo = $tipo[0]->EsFamiliar;
         $documentos="";
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
       //dd($turista->documentos);
    return view('user.editarFamiliarAmigo', compact('turista','documentos','nacionalidad','tipo'));
   }


   public function guardarInformacionFamiliarAmigoEditado(Request $request){
      dd('Hola Mundo');
      
   }

}
