<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Nacionalidad;
use App\Turista;			
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


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
	public function editInfo()
    {    
        $existe ="";
        $t = DB::table('Turista')->where('IdPersona', auth()->user()->IdPersona)->first();
        if($t == null){
         $existe = "n";
        }else{
         $existe = "s";
        }
        $usuario = User::findOrFail(auth()->user()->id);
        $nacionalidad = Nacionalidad::all();


        return view('user.completarInfoUserTurista', compact('usuario','nacionalidad' ,'existe'));
    }
    
     public function storeCompleteInfo(Request $request)
    {    
        $documento = "";
        $existe ="";
        //dd($request);
        $this->validate($request, [
              "nacionalidad" => "required",
              "fechaNacimiento" => "required",
              "tdocumento" => "required",
              "fvencimiento" => "required",
              "direccion" => "required",
        ]);
        if($request->tdocumento == "t1"){
           $this->validate($request, [
             "dui" => "required", 
        ]);  
        }
        if($request->tdocumento == "t2"){
           $this->validate($request, [
             "pasaporte" => "required",
        ]);  
        }
        if($request->tdocumento == "t1"){
           $documento = $request->dui;
        }else{
            $documento = $request->pasaporte;
        }
         $t = DB::table('Turista')->where('IdPersona', auth()->user()->IdPersona)->first();
         if($t == null){
            $existe = "n";
          }else{
           $existe = "s";
          }
         if( $existe == "n"){
           $turista = Turista::create([
              'IdNacionalidad'=> $request->nacionalidad,
              'IdPersona' => auth()->user()->IdPersona,
              "FechaNacimiento" => $request->fechaNacimiento,
              "TipoDocumento" => $request->tdocumento,
              "Dui_Pasaporte" => $documento,
              "CategoriaTurista"  => 'A',            
              "FechaVenceDocumen" => $request->fvencimiento,
              "DomicilioTurista" => $request->direccion,
              "Problemas_Salud" => $request->psalud,
              
        ]);
         }else{
           $turistaAux = Turista::find($t->IdTurista);
          /* $turistaAux->IdNacionalidad = $request->nacionalidad,
           $turistaAux->FechaNacimiento = $request->fechaNacimiento,
           $turistaAux->TipoDocumento = $request->tdocumento,
           $turistaAux->Dui_Pasaporte = $documento,            
           $turistaAux->FechaVenceDocumen = $request->fvencimiento,
           $turistaAux->DomicilioTurista = $request->direccion,
           $turistaAux->Problemas_Salud = $request->psalud,
           $turistaAux->save(); */
         }
           
        $usuario = User::findOrFail(auth()->user()->id);
        $nacionalidad = Nacionalidad::all();
          
      // return view('user.completarInfoUserTurista', compact('usuario','nacionalidad' ,'existe')); 
      return redirect()->route('user.complete.info',compact('usuario','nacionalidad' ,'existe'));
        
    }

    public function editInfoUserTurista($id){
       // $id =  Crypt::decrypt($id);
        
        $turista = DB::table('Turista')->where('IdPersona', auth()->user()->IdPersona)->first();
        $nacionalidad = Nacionalidad::all();

        return view('user.editInfoUserTurista', compact('turista', 'nacionalidad'));
    }

    public function addFamiliarAmigo()
    {    

        $usuario = User::findOrFail(auth()->user()->id);
        $nacionalidad = Nacionalidad::all();
        return view('user.agregarFamiliaAmigo', compact('usuario','nacionalidad'));
    }
}
