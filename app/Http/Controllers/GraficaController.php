<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraficaController extends Controller
{
  public function index()
    {
      //Genero de los usuarios
     $data = DB::table('personas')
       ->select(
        DB::raw('"Genero" as genero'),
        DB::raw('count(*) as number'))
       ->groupBy('genero')
       ->get();
     $array[] = ['Genero', 'Numero'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->genero, $value->number];
     }

     //Rutas por paises
    $paises = DB::table('Pais')
      ->join('RutaTuristica', 'Pais.IdPais', '=', 'RutaTuristica.IdPais')
      ->select(DB::raw('"nombrePais" as pais, count("nombrePais") as number'))
      ->groupBy('Pais.nombrePais')
      ->get();
    $paisesarray[] = ['Pais', 'Numero'];
     foreach($paises as $key => $value)
     {
      $paisesarray[++$key] = [$value->pais, $value->number];
     }

     //Paquetes por mes de año de 2018 que fueron aprobados y disponibles
     $paquetes = DB::table('Paquetes')
       ->select(
          DB::raw('EXTRACT(MONTH FROM "FechaSalida") as mes'),
          DB::raw('COUNT(EXTRACT(MONTH FROM "FechaSalida")) as number')
          )
       ->orderBy('mes', 'asc')
       ->groupBy(
          DB::raw('EXTRACT(MONTH FROM "FechaSalida")')
         )
       ->get();
     $paquetesarray[] = ['Mes', 'Viajes 2018'];
      foreach($paquetes as $key => $value)
      {
       $paquetesarray[++$key] = [$value->mes, $value->number];
      }

     return view('graficas.index')
            ->with('genero', json_encode($array))
            ->with('pais', json_encode($paisesarray))
            ->with('paquete', json_encode($paquetesarray));
    }
}
