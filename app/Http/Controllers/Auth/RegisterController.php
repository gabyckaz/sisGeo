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
        /*
        *Validamos campos necesarios
        *
        */

        return Validator::make($data, [
            'name' => 'required|alpha|min:2|max:25',
            'SegundoNombrePersona'=>'alpha|nullable|min:2|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'PrimerApellidoPersona' => 'required|alpha|min:2|max:25',
            'SegundoApellidoPersona' => 'alpha|nullable|min:2|max:25',
            'TelefonoContacto' => 'required|max:10',
            'RecibirNotificacion' => 'required',
            'Genero' => 'required',
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
        /**
        *Extraemos el rol de usuario de la Bd para luego asignarselo al nuevo usuario de la *aplicacion.
        */
        $rol = Role::where('name','User')->first();
        if($rol->name != 'User'){
          return 'No existe el Rol de usuario';
        }
        /*
        *Creamos la persona para este usuario.
        *Lo creamos de esta forma para poder usar el id de la persona recien creada
        */
        $persona = Persona::create([
          'PrimerNombrePersona'=>$data['name'],
          'SegundoNombrePersona'=>$data['SegundoNombrePersona'],
          'PrimerApellidoPersona'=>$data['PrimerApellidoPersona'],
          'SegundoApellidoPersona'=>$data['SegundoApellidoPersona'],
          'Genero'=>$data['Genero'],
          'AreaTelContacto'=>$data['AreaTelContacto'],
          'TelefonoContacto'=>$data['TelefonoContacto']
        ]);
        /*
        *Creamos el usuario utilzando el id de la persona creada anteriormente
        *el usuario es creado con estado activo
        */
        $usuario = User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
           'IdPersona' => $persona->IdPersona,
           'RecibirNotificacion' => $data['RecibirNotificacion'],
           'EstadoUsuario' => '1',
         ]);
        /*
        *Agregamos el rol de usuario al nuevo usuario
        */
        $usuario->attachRole($rol);
        return $usuario;
    }
}
