<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecomendacionesController extends Controller
{

    public function index()
    {
      $paquete=Paquete::all();
      return view('adminRecomendaciones.index')
      ->with('paquete',$paquete);
    }
}
