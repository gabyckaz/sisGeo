<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

class GraficaController extends Controller
{
  public function index()
    {
      setlocale(LC_ALL,"es_ES");

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
        if($value->genero=='F')
          $value->genero='Femenino';
        else {
          $value->genero='Masculino';
        }
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
     // $paquetes2017 = DB::table('Paquetes')
     //   ->select(
     //      DB::raw('EXTRACT(MONTH FROM "FechaSalida") as mes2017'),
     //      DB::raw('COUNT(EXTRACT(MONTH FROM "FechaSalida")) as number1')
     //      )
     //   //->orderBy('mes', 'asc')
     //   ->groupBy(
     //      DB::raw('EXTRACT(MONTH FROM "FechaSalida")')
     //     )
     //   ->where(
     //     DB::raw('EXTRACT(YEAR FROM "FechaSalida")'), '=', 2017);

     $paquetes = DB::table('Paquetes')
       ->select(
          DB::raw('EXTRACT(MONTH FROM "FechaSalida") as mes'),
          DB::raw('COUNT(EXTRACT(MONTH FROM "FechaSalida")) as number')
          )
       ->orderBy('mes', 'asc')
       ->groupBy(
          DB::raw('EXTRACT(MONTH FROM "FechaSalida")')
         )
       ->where(
         DB::raw('EXTRACT(YEAR FROM "FechaSalida")'), '=', 2018)
      // ->union($paquetes2017)
       ->get();
     $paquetesarray[] = ['Mes', 'Viajes 2018'];

     //Cambiando el numero del mes por el nombre en español, ej: 1 -> Enero
     foreach($paquetes as $key => $value)
     {
       $value->mes=DateTime::createFromFormat('!m', $value->mes);
       $value->mes=strftime("%B",$value->mes->getTimestamp());
       $value->mes=ucfirst($value->mes);
     }
      foreach($paquetes as $key => $value)
      {
        $paquetesarray[++$key] = [$value->mes, $value->number];
      }

      //Rutas por categorias
      $categorias = DB::table('Categoria')
        ->join('RutaTuristica', 'Categoria.IdCategoria', '=', 'RutaTuristica.IdCategoria')
        ->select(DB::raw('"NombreCategoria" as categoria, count("NombreCategoria") as number'))
        ->groupBy('Categoria.NombreCategoria')
        ->get();
      $categoriasarray[] = ['Categoria', 'Numero'];
      foreach($categorias as $key => $value)
      {
       $categoriasarray[++$key] = [$value->categoria, $value->number];
      }

      //Costos de trasporte
      $costos = DB::table('Paquetes')
        ->join('CostoAlquilerTransporte', 'Paquetes.IdPaquete', '=', 'CostoAlquilerTransporte.IdPaquete')
        ->select(
          DB::raw('EXTRACT(MONTH FROM "Paquetes"."FechaSalida") as mes'),
          DB::raw('SUM("CostoAlquilerTransporte") as number')
          )
        ->groupBy(DB::raw('EXTRACT(MONTH FROM "FechaSalida")'))
        ->get();
      $costosarray[] = ['Meses', 'Cantidad en dólares ($)'];
      foreach($costos as $key => $value)
      {
        $value->mes=DateTime::createFromFormat('!m', $value->mes);
        $value->mes=strftime("%B",$value->mes->getTimestamp());
        $value->mes=ucfirst($value->mes);
      }
      foreach($costos as $key => $value)
      {
       $costosarray[++$key] = [$value->mes, $value->number];
      }

     return view('graficas.index')
            ->with('genero', json_encode($array))
            ->with('pais', json_encode($paisesarray))
            ->with('paquete', json_encode($paquetesarray))
            ->with('categorias', json_encode($categoriasarray,JSON_UNESCAPED_UNICODE))
            ->with('costos', json_encode($costosarray));
    }
}
