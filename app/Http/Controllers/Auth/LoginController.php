<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request) { 
        
        if($this->guard()->user()->EstadoUsuario == 0){ 
            $this->guard()->logout(); 
            return redirect()->back() 
            ->withInput($request->only($this->username(), 'remember')) 
            ->withErrors(['active' => 'El usuario no esta activo.']); } 
            $request->session()->regenerate(); $this->clearLoginAttempts($request); 
            return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath()); 
        } 

}
