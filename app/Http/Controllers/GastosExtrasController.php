<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RutaTuristica;
use App\Paquete;
use App\GastosExtras;
use Illuminate\Support\Facades\Input;

class GastosExtrasController extends Controller
{
    public function index()
    {
      $paquete=Paquete::all();
      return view('adminGastosExtras.index')
      ->with('paquete',$paquete);
    }

}
