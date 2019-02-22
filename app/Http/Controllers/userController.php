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
use App\Categoria;
use App\TuristaCategoriaPaq;
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

        return redirect()->route('home')->with('info','Este no es tu Usuario');
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
        //$t = DB::table('turista')->where('IdPersona', auth()->user()->IdPersona)->first();
        //$t = Turista::find(auth()->user()->IdPersona); //--> arreglar esto xq no me esta buscando el turista con id de turista
        $turista = Turista::where('IdPersona',auth()->user()->IdPersona)->first();
        //$documento = TipoDocumento::where('IdTurista',$t->IdTurista);
        //$d = TipoDocumento::find(1)->get();
        //dd($d);
        $documentos="";
        $misPreferencias = array();

        if($turista == null){
         $existeTurista = "no";
        }else{
         $existeTurista = "si";
       /* if(strlen( $turista->IdsCategoriasStr ) > 0 && $turista->IdsCategoriasStr != null){
          $misPreferencias = explode(",", $turista->IdsCategoriasStr);
        }*/
        $query = 'SELECT tc.IdCategoria as Id
          FROM turistacategoria as tc
          WHERE tc.IdTurista = '.$turista->IdTurista.';';
          $misPq = DB::select($query);

          if($misPq != null){
            for ($i=0; $i < count($misPq); $i++) {
             $val= $misPq[$i]->Id;
             $misPreferencias[] = (int)$val;
            }

          }
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
        $categorias = Categoria::all();

        return view('user.completarInformacionUsuario', compact('usuario','nacionalidad' ,'existeTurista','turista','documentos','categorias','misPreferencias'));
    }

     public function completarInformacion(Request $request)
    {
        $categorias = Categoria::all();
        $documentos = "";
        $existeTurista ="";
        //dd($request);
        $this->validate($request, [
            "PrimerNombrePersona" => "required|alpha|min:2|max:25",
            "SegundoNombrePersona" => "alpha|nullable|min:2|max:25",
            "PrimerApellidoPersona" => "required|alpha|min:2|max:25",
            "SegundoApellidoPersona" => "alpha|nullable|min:2|max:25",
            "TelefonoContacto" => "required|numeric",
            "fechaNacimiento" => "required|fnic|vmedad",
            "direccion" => "required|min:10|max:100",
            "preferencias" => "required",
          ]);
        
        if( $request->input("dui") == null && $request->input("pasaporte") == null){

          return redirect()->back()->with('documento', 'Un documento es requerido')->withInput();
       
         }elseif($request->input("dui") != null && $request->input("pasaporte") != null){
             $this->validate($request, [
             "dui" => "dui",
             "pasaporte" => "alpha_num",
             "fechaVencimientoD" => "required|fvdp",
             "fechaVencimientoP" => "required|fvdp",
           ]);

        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){

           $this->validate($request, [
              "dui" => "dui",
             "fechaVencimientoD" => "required|fvdp",
            ]);

        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){

            $this->validate($request, [
            "fechaVencimientoP" => "required|fvdp",
           ]);
        }
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
          $persona = Persona::find(auth()->user()->IdPersona);

          $persona->PrimerNombrePersona = $request->PrimerNombrePersona;
          $persona->SegundoNombrePersona = $request->SegundoNombrePersona;
          $persona->PrimerApellidoPersona = $request->PrimerApellidoPersona;
          $persona->SegundoApellidoPersona = $request->SegundoApellidoPersona;
          $persona->AreaTelContacto = $request->AreaTelContacto;
          $persona->TelefonoContacto = $request->TelefonoContacto;
          $persona->save();

         //no existe turista entonces lo creo
         $turista = Turista::create([
              'IdNacionalidad'=> $request->nacionalidad,
              'IdPersona' => auth()->user()->IdPersona,
              "FechaNacimiento" => $request->fechaNacimiento,
              "CategoriaTurista"  => 'A',
              "DomicilioTurista" => $request->direccion,
              "Problemas_Salud" => $request->psalud,
        ]);
         /*if(count($request->preferencias) > 0 ){
          $str_ids = implode(",", $request->preferencias);
            $turista->IdsCategoriasStr = $str_ids;
            $turista->save();
          }*/
          for ($i=0; $i<count($request->preferencias);$i++){
              $turistaCategoria = new TuristaCategoriaPaq();
              $turistaCategoria->IdTurista = $turista->IdTurista;
              $turistaCategoria->IdCategoria = $request->preferencias[$i];
              $turistaCategoria->save();
          }

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
         $misPreferencias = array();
          $query = 'SELECT tc.IdCategoria as Id
          FROM turistacategoria as tc
          WHERE tc.IdTurista = '.$turista->IdTurista.';';
          $misPq = DB::select($query);

          if($misPq != null){
            for ($i=0; $i < count($misPq); $i++) {
             $val= $misPq[$i]->Id;
             $misPreferencias[] = (int)$val;
            }

          }

        $nacionalidad = Nacionalidad::all();
        $existeTurista = "si";
        return redirect('user/completarInformacion')->with('message','Actualizado con éxito');
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
        //  $turista->IdNacionalidad = $request->nacionalidad;
          $turista->IdPersona = $persona->IdPersona;
        //$t->CategoriaTurista = $request->;
          $turista->FechaNacimiento = $request->fechaNacimiento;
          $turista->DomicilioTurista = $request->direccion;
          $turista->Problemas_Salud = $request->psalud;
          $turista->save();
          /*if(count($request->preferencias) > 0){
          $str_ids = implode(",", $request->preferencias);ff
            $turista->IdsCategoriasStr = $str_ids;
            $turista->save();
          } */
           $turistaCatPaqBorrar = TuristaCategoriaPaq::where('IdTurista',$turista->IdTurista);
           $turistaCatPaqBorrar->delete();
          for ($i=0; $i<count($request->preferencias);$i++){
              $turistaCategoria = new TuristaCategoriaPaq();
              $turistaCategoria->IdTurista = $turista->IdTurista;
              $turistaCategoria->IdCategoria = $request->preferencias[$i];
              $turistaCategoria->save();
          }

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
        $categorias = Categoria::all(); //---- Modificar Aqui :,v solo para las que se muestran
     /*  if((strlen( $turista->IdsCategoriasStr ) > 0 && $turista->IdsCategoriasStr != null)){
          $misPreferencias = explode(",", $turista->IdsCategoriasStr);
        }*/
        $misPreferencias = array();
          $query = 'SELECT tc.IdCategoria as Id
          FROM turistacategoria as tc
          WHERE tc.IdTurista = '.$turista->IdTurista.';';
          $misPq = DB::select($query);

          if($misPq != null){
            for ($i=0; $i < count($misPq); $i++) {
             $val= $misPq[$i]->Id;
             $misPreferencias[] = (int)$val;
            }

          }

      // return view('user.completarInfoUserTurista', compact('usuario','nacionalidad' ,'existe'));
      return redirect('user/completarInformacion')->with('message','Informacion Actualizada');

    }


    public function editInfoUserTurista($id){
       // $id =  Crypt::decrypt($id);

        $turista = DB::table('turista')->where('IdPersona', auth()->user()->IdPersona)->first();
        $nacionalidad = Nacionalidad::all();

        return view('user.editInfoUserTurista', compact('turista', 'nacionalidad'));
    }

    public function agregarFamiliarAmigo(Request $request)
    {
          $idTuristaUsuario = "si";
       // $usuario = User::findOrFail(auth()->user()->id);
         $nacionalidad = Nacionalidad::all();
         $sqlUserTurista = 'SELECT   t.IdTurista as Id
          FROM users as u, turista as t,
          personas as p
          WHERE u.IdPersona = p.IdPersona and
          t.IdPersona=p.IdPersona and
          u.id = '.auth()->user()->id.';';
          $userTurista = DB::select($sqlUserTurista);
          if($userTurista == null){
            $idTuristaUsuario = "no";
          }

          $sql = '(SELECT  a.IdUsuario,a.IdFamiliarAmigo,a.IdTurista,a.EsFamiliar,
          p.PrimerNombrePersona,p.PrimerApellidoPersona,p.Genero,
          n.Nacionalidad,t.FechaNacimiento, t.DomicilioTurista,
          t.Problemas_Salud
          FROM acompanante as a, turista as t,
          personas as p, nacionalidad as n
          WHERE a.IdTurista = t.IdTurista and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          a.IdUsuario = '.auth()->user()->id.' )
        UNION
          (SELECT  u.id,(0) as IdFamiliarAmigo, t.IdTurista,('."'af'".') as EsFamiliar,
          p.PrimerNombrePersona,p.PrimerApellidoPersona,p.Genero,
          n.Nacionalidad,t.FechaNacimiento, t.DomicilioTurista,
          t.Problemas_Salud
          FROM users as u, turista as t,
          personas as p, nacionalidad as n
          WHERE u.IdPersona = p.IdPersona and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          u.id = '.auth()->user()->id.')';
         $familiaAmigos = DB::select($sql);

        $familiaAmigos = $this->arrayPaginator($familiaAmigos);
        return view('user.agregarFamiliaAmigo', compact('nacionalidad','familiaAmigos','idTuristaUsuario'));

    }

    public function arrayPaginator($array)
{
    $page = Input::get('page', 1);
    $perPage = 10;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => 'agregarFamiliarAmigo']);
}


    public function guardarFamiliarAmigo(Request $request){
     //  $date = Carbon::createFromDate(1989, 8, 15)->age;
      //dd($request);
          $this->validate($request, [
          "Nombre" => "required|alpha|min:3|max:25",
          "Apellido" => "required|alpha|min:3|max:25",
          "fechaNacimiento" => "required|fnic",
          "Direccion" => "required|min:10|max:100",
        ]);
           /*$hoystr = Carbon::now()->format('d-m-Y');
           $hoyObj = Carbon::parse($hoystr);
           $fechaIngresadaObj = Carbon::parse($request->fechaNacimiento);

          if($fechaIngresadaObj >= $hoyObj){

            return redirect()->back()->withInput()->with('ErrorFechaNac', 'Error fecha incorrecta');
          }


         $hoystr = Carbon::now()->format('d-m-Y');
         $hoyObj = Carbon::parse($hoystr);
         $fechaIngresadaObj = Carbon::parse($request->fechaNacimiento);
          if($fechaIngresadaObj >= $hoyObj ){
            return redirect()->back()->withInput()->with('ErrorFechaNac', 'Error fecha incorrecta');
          } */
       $edad = Carbon::parse($request->fechaNacimiento)->age;

      if( $edad >= 18 && $request->input("dui") == null && $request->input("pasaporte") == null){
            $hola1 = "Debes introducir por lo menos un documento";
            return redirect()->back()->with('documento', 'Un documento es requerido')->withInput();
        }
      if($edad >= 18 && $request->input("dui") != null && $request->input("pasaporte") != null){
            $this->validate($request, [
            "dui" => "dui",
            "pasaporte" => "alpha_num",
            "fechaVencimentoD" => "required|fvdp",
            "fechaVencimentoP" => "required|fvdp",
           ]);

        }
        if($edad >= 18 && $request->input("dui") != null && $request->input("pasaporte") == null ){
           $this->validate($request, [
              "dui" => "dui",
              "fechaVencimentoD" => "required|fvdp",
           ]);
        }
        if($edad >= 18 && $request->input("dui") == null && $request->input("pasaporte") != null ){
      
            $this->validate($request, [
              "pasaporte" => "alpha_num",
              "fechaVencimentoP" => "required|fvdp",
           ]);
        }
    
      $persona = Persona::create([
            "PrimerNombrePersona" => $request->Nombre,
            "PrimerApellidoPersona" => $request->Apellido,
            "Genero" => $request->genero,
           // "AreaTelContacto"=>'503',
          //  "TelefonoContacto" => '76788859',

         ]);
      $turista = Turista::create([
              'IdNacionalidad'=> $request->nacionalidad,
              'IdPersona' => $persona->IdPersona,
              "FechaNacimiento" => $request->fechaNacimiento,
              "CategoriaTurista"  => 'A',
              "DomicilioTurista" => $request->Direccion,
              "Problemas_Salud" => $request->psalud,
        ]);

       if($edad >= 18 ){
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
      }

         $familiarAmigo = Acompanante::create([
          'IdTurista' => $turista->IdTurista,
          'IdUsuario' => auth()->user()->id,
          'EsFamiliar' => $request->tipo,
         ]);

      return redirect()->route('user.agregar.familiarAmigo')->with('message',' Agregado con éxito');
    }

   public function editarInformacionFamiliarAmigo($idTurista){
        $nacionalidad = Nacionalidad::all();
       $sql = 'SELECT IdFamiliarAmigo, IdTurista, IdUsuario, EsFamiliar
                FROM acompanante
                WHERE IdUsuario = '.auth()->user()->id.' AND IdTurista = '.$idTurista.';';
       $resultado= DB::select($sql);
       if($resultado == null){
         return redirect()->route('user.agregar.familiarAmigo')->with('message', 'No encontrado');
       }

       $turista = Turista::find($idTurista );
        $sqltipo = 'SELECT EsFamiliar
                    FROM acompanante
                    WHERE IdTurista = '.$turista->IdTurista.';';
        $tipo = DB::select($sqltipo);
        $tipo = $tipo[0]->EsFamiliar;
         $documentos="";
        if($turista->documentos->count() == 0){
           $documentos = "menorDeEdad";
        }else{
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
         } }
    return view('user.editarFamiliarAmigo', compact('turista','documentos','nacionalidad','tipo'));
   }


   public function guardarInformacionFamiliarAmigoEditado(Request $request){
     $this->validate($request, [
             "Nombre" => "required|alpha|min:3|max:25",
             "Apellido" => "required|alpha|min:3|max:25",
             "Direccion" => "required|min:10|max:100",
           ]);
     //Opcion numero 2
       /*$hoystr = Carbon::now()->format('d-m-Y');
       $hoyObj = Carbon::parse($hoystr);
       $fechaIngresadaObj = Carbon::parse($request->fechaVencimentoD);

      if($hoyObj > $fechaIngresadaObj){

        return redirect()->back()->withInput()->with('error', 'Fecha de vencimiento incorrecta');
      }

       $lengthOfAd = $hoyObj->diffInDays($fechaIngresadaObj);
       dd($lengthOfAd); */

       $edad = Carbon::parse($request->fechaNacimiento)->age;

/*          $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "Direccion" => "required|min:10|max:100",
        ]);*/
        if($request->input("dui") != null && $request->input("pasaporte") != null){
          $hola1 = "Ingresastes los dos documentos";
          if($edad >= 18){
             $this->validate($request, [
             "Nombre" => "required|alpha|min:3|max:25",
             "Apellido" => "required|alpha|min:3|max:25",
             "Direccion" => "required|min:10|max:100",
             "fechaVencimentoD" => "required",
             "fechaVencimentoP" => "required",
           ]);
             if(!$this->validaDui($request->dui)){
            return redirect()->back()->withInput()->with('Errordui', 'Numero de dui Incorrecto');
           }
           }else{
            $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "Direccion" => "required|min:10|max:100",
        ]);
           }
        }elseif($request->input("dui") != null && $request->input("pasaporte") == null ){
           $hola1 = "Solo Ingresastes El dui";
           if($edad >= 18){
           $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "Direccion" => "required|min:10|max:100",
              "fechaVencimentoD" => "required",
           ]);
           if(!$this->validaDui($request->dui)){
            return redirect()->back()->withInput()->with('Errordui', 'Numero de dui Incorrecto');
           }
         }else{
          $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "Direccion" => "required|min:10|max:100",
        ]);
         }
        }elseif($request->input("dui") == null && $request->input("pasaporte") != null ){
           $hola1 = "Solo Ingresastes El pasaporte";
            if($edad >= 18){
            $this->validate($request, [
             "Nombre" => "required|alpha|min:3|max:25",
             "Apellido" => "required|alpha|min:3|max:25",
             "Direccion" => "required|min:10|max:100",
             "fechaVencimentoP" => "required",
           ]);
          }else{
            $this->validate($request, [
              "Nombre" => "required|alpha|min:3|max:25",
              "Apellido" => "required|alpha|min:3|max:25",
              "Direccion" => "required|min:10|max:100",
        ]);
          }
        }

          $turista = Turista::find($request->idTurista);
       //Actualizo a la persona
          $persona = Persona::find($turista->IdPersona);
          $persona->PrimerNombrePersona = $request->Nombre;
          $persona->PrimerApellidoPersona = $request->Apellido;
          $persona->save();

        //Actualizo al turista

        //$t->CategoriaTurista = $request->;
          $turista->DomicilioTurista = $request->Direccion;
          $turista->Problemas_Salud = $request->psalud;
          $turista->save();
          //Actualizo documentos o los creo si no existen
         if($edad >= 18){
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
      }

     return redirect()->route('user.agregar.familiarAmigo')->with('message',' Informacion actualizada con éxito');
   }

 public function prueba(){
    //$ts = Turista::all();
         /*$sql = 'SELECT "IdTurista", "IdNacionalidad", "IdPersona", "CategoriaTurista", "FechaNacimiento", "DomicilioTurista", "Problemas_Salud"
          FROM "turista"';
         */
          $sqlUserTurista = 'SELECT   t.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido
          FROM users as u, turista as t,
          personas as p
          WHERE u.IdPersona = p.IdPersona and
          t.IdPersona=p.IdPersona and
          u.id = '.auth()->user()->id.';';
          $userTurista = DB::select($sqlUserTurista);

          $sqlAmigos = 'SELECT  a.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido,a.EsFamiliar as Tipo,p.Genero
          FROM acompanante as a, turista as t,
          personas as p, nacionalidad as n
          WHERE a.IdTurista = t.IdTurista and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          a.IdUsuario = '.auth()->user()->id.' AND a.EsFamiliar = \'A\';';
          $amigos = DB::select($sqlAmigos);

          $sqlFamilia = 'SELECT  a.IdTurista as Id,
          p.PrimerNombrePersona as Nombre,p.PrimerApellidoPersona as Apellido,a.EsFamiliar as Tipo,p.Genero
          FROM acompanante as a, turista as t,
          personas as p, nacionalidad as n
          WHERE a.IdTurista = t.IdTurista and
          t.IdPersona=p.IdPersona and t.IdNacionalidad = n.IdNacionalidad and
          a.IdUsuario = '.auth()->user()->id.' AND a.EsFamiliar = \'F\';';
          $familia = DB::select($sqlFamilia);

       return view('user.pruebaApi',compact('userTurista','amigos','familia'));//\Response::json($resultado);
 }
/*
Para el del DUI el proceso que recuerdo es este:
-el numero que esta a la derecha del guion se conoce como digito verificador
-se coloca el numero sin guiones y con ceros a la izquierda
-deben ser 9 caracters
-se toman los primeros 8 caracteres (sin el digito verificador) y a cada uno se le multiplica por la posicion en la que se encuentra. Partiendo que la posicion 9 es el primer numero de la izquierda.
-se suman todos los resultados
-se hace un mod de la suma dividido por 10 (osea toma el remanente de esa division)
-Resta 10 menos el remanente de la division
-si la resta da 0 el DUI es correcto
-si la resta es igual al digito verificador el DUI es correcto
-si la resta es distinta al digito verificador el DUI es incorrecto
*/
 public function validaDui($dui){
      $separador ='-';
      $partesDui = explode('-', $dui);
      $numeroDui = $partesDui[0];
      $digitoVerificador = $partesDui[1];
      $arrayNumeroDui = str_split($numeroDui);
      $suma = (9*$arrayNumeroDui[0])+(8*$arrayNumeroDui[1])+(7*$arrayNumeroDui[2])+(6*$arrayNumeroDui[3])+(5*$arrayNumeroDui[4])+(4*$arrayNumeroDui[5])+(3*$arrayNumeroDui[6])+(2*$arrayNumeroDui[7]);
      $moduloDiv = $suma%10;
      $resta = 10-$moduloDiv;
      $resta=$resta.'';
      $digitoVerificador=$digitoVerificador.'';
      $moduloDiv=$moduloDiv.'';

      if($resta === '0' || $resta === $digitoVerificador || $moduloDiv === '0'){
        //  dd($resta.'-'.$moduloDiv.'-'.$digitoVerificador);
        return true;
      }
      return false;
 }

 /**
 *Funcion para validar la edad del usuario
 */    
 public function validaEdad($fecha){
       $hoystr = Carbon::now()->format('d-m-Y');
       $hoyObj = Carbon::parse($hoystr);
       $fechaIngresada = Carbon::parse($fecha);
       $fechaIngresadaStr = $fechaIngresada->format('d-m-Y');
       $fechaIngresadaObj = Carbon::parse($fechaIngresadaStr);

      if( $fechaIngresadaObj >= $hoyObj ){
        return true;
      }
      return false;
    }


}
