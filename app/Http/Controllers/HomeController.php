<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\ImagenPaqueteTuristico;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);

      $imagenes = ImagenPaqueteTuristico::all();

      return view('home')
      ->with('imagenes',$imagenes)
      ->with('paquetes',$paquetes);

    }
}
