<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use DB;

use Illuminate\Http\Request;

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
       $usuarios = User::sortable()
       ->nombre($request->get('nombre'))
       ->email($request->get('email'))
       ->estado($request->get('estado'))
       ->rol($request->get('rol'))
        ->orderBy('id','desc')->paginate(5);

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
      return redirect()->route('adminUser.index');
     }
        if(($usuario->EstadoUsuario === '1')){
           DB::table('users')->where('id', $usuario->id)->update([
            "EstadoUsuario" => '0',


        ]);
           return redirect()->route('adminUser.index');

         //  return "Hola mundo - ".$usuario->estado;
    }



     }


}
