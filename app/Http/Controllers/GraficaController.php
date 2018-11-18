<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraficaController extends Controller
{
  public function index()
    {
     $data = DB::table('personas')
       ->select(
        DB::raw('genero as genero'),
        DB::raw('count(*) as number'))
       ->groupBy('genero')
       ->get();
     $array[] = ['Genero', 'Numero'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->genero, $value->number];
     }
     return view('graficas.index')->with('genero', json_encode($array));
    }
}
