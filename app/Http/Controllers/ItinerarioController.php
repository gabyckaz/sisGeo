<?php

namespace App\Http\Controllers;
use DB;
use App\RutaTuristica;
use App\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\GastosExtras;
use App\Itinerario;
use Illuminate\Http\Request;

class ItinerarioController extends Controller
{
    public function index()
    {
      $paquete=Paquete::all();
      return view('adminIncluye.index')
      ->with('paquete',$paquete);
    }
}
