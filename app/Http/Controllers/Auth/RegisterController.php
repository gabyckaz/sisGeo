<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Persona;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            /*'segundoNombre' => 'string|max:255',
            'primerApellido' => 'required|string|max:255',
            'segundoApellido' => 'string|max:255',
            'codigoArea' => 'required|string',
            'sexo' => 'required|string',
            'telefono' => 'required|string|max:255',*/
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {  
       // $a =User::where('id', 1)->get();
       // dd($a);
        $rol = Role::find(2);
        
        if($rol->name != 'User'){
          return 'No existe el Rol de usuario';
        }

        $persona = Persona::create([
          'PrimerNombrePersona'=>$data['name'],
          'SegundoNombrePersona'=>$data['SegundoNombrePersona'],
          'PrimerApellidoPersona'=>$data['PrimerApellidoPersona'],
          'SegundoApellidoPersona'=>$data['SegundoApellidoPersona'],
          'Genero'=>$data['Genero'],
          'AreaTelContacto'=>$data['AreaTelContacto'],
          'TelefonoContacto'=>$data['TelefonoContacto']
        ]);
       // dd($persona->IdPersona);
        $usuario = User::create([
           'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'IdPersona' => $persona->IdPersona,
            /*'segundoNombre' => $data['segundoNombre'],
            'primerApellido' => $data['primerApellido'],
            'segundoApellido' => $data['segundoApellido'],
            'sexo' => $data['sexo'],
            'codigoArea' => $data['codigoArea'],
            'telefono' => $data['telefono'],*/
            'RecibirNotificacion' => $data['RecibirNotificacion'],
            'EstadoUsuario' => '1',
         ]);     

        $usuario->attachRole($rol);    
       
        
        return $usuario;     //User::where('id', $user->id); 
    }

   /* public function roles()
    {
        return $this->belongsToMany('App\Role');
    }*/
}
