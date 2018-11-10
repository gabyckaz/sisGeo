<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CondicionesController extends Controller
{
    public function index()
    {
      $paquete=Paquete::all();
      return view('adminCondiciones.index')
      ->with('paquete',$paquete);
    }
}
