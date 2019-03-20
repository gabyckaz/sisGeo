<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use Carbon;

class GraficaController extends Controller
{
  public function index()
    {
      setlocale(LC_ALL,"es_ES");

      //Genero de los usuarios
     $data = DB::table('personas')
       ->select(
        DB::raw('Genero as genero'),
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
    $paises = DB::table('pais')
      ->join('rutaturistica', 'pais.IdPais', '=', 'rutaturistica.IdPais')
      ->select(
        DB::raw('nombrePais as pais'),
        DB::raw('count(nombrePais) as number'))
      ->groupBy('pais.nombrePais')
      ->get();
    $paisesarray[] = ['Pais', 'Numero'];
     foreach($paises as $key => $value)
     {
      $paisesarray[++$key] = [$value->pais, $value->number];
     }

     //Paquetes realizados en 2018
     $q=date('Y-m-d',strtotime(date('Y-01-01')));
     $paquetes = DB::table('paquetes')
       ->select(
          DB::raw('EXTRACT(MONTH FROM FechaSalida) as mes'),
          DB::raw('COUNT(EXTRACT(MONTH FROM FechaSalida)) as number')
          )
       ->orderBy('mes', 'asc')
       ->groupBy(
          DB::raw('EXTRACT(MONTH FROM FechaSalida)')
         )
       ->where(
          DB::raw('EXTRACT(YEAR FROM FechaSalida)'), '=', 2018)
       ->get();

      // $sql='select EXTRACT(MONTH FROM FechaSalida) as mes, COUNT(EXTRACT(MONTH FROM FechaSalida)) as number from paquetes where FechaSalida > DATE_FORMAT(CURDATE(), "%Y-01-01")and FechaSalida < CURDATE()
      //  group by EXTRACT(MONTH FROM FechaSalida);';
      // $paquetes = DB::select($sql);

     $paquetesarray[] = ['Mes', 'Excursiones'];

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
      $categorias = DB::table('categoria')
        ->join('rutaturistica', 'categoria.IdCategoria', '=', 'rutaturistica.IdCategoria')
        ->select(
          DB::raw('NombreCategoria as categoria'),
          DB::raw('count(NombreCategoria) as number'))
        ->groupBy('categoria.NombreCategoria')
        ->get();
      $categoriasarray[] = ['Categoria', 'Numero'];
      foreach($categorias as $key => $value)
      {
       $categoriasarray[++$key] = [$value->categoria, $value->number];
      }

      //Costos de trasporte
      $costos = DB::table('paquetes')
        ->join('costoalquilertransporte', 'paquetes.IdPaquete', '=', 'costoalquilertransporte.IdPaquete')
        ->select(
          DB::raw('EXTRACT(MONTH FROM paquetes.FechaSalida) as mes'),
          DB::raw('SUM(CostoAlquilerTransporte) as number')
          )
        ->groupBy(
          DB::raw('EXTRACT(MONTH FROM FechaSalida)')
          )
        ->where(
           DB::raw('EXTRACT(YEAR FROM FechaSalida)'), '=', 2018)  
        ->get();
      $costosarray[] = ['Meses', 'En dólares ($)'];
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

      //Listado de cumpleañeros del mes (usuarios activos)
      $mes_actual = Carbon\Carbon::now()->format('m');
      $cumples= DB::table('turista')
        ->join('personas', 'turista.IdPersona', '=', 'personas.IdPersona')
        ->join('users', 'personas.IdPersona', '=', 'users.IdPersona')
        ->select('personas.PrimerNombrePersona','personas.PrimerApellidoPersona','turista.FechaNacimiento','email' )
        ->where([
          [DB::raw('EXTRACT(MONTH FROM FechaNacimiento)'), '=', $mes_actual],
          ['EstadoUsuario', '=', '1'],
         ])
        ->get();

      //Total de cumpleañeros del mes (usuarios activos)
      $total_cumples= DB::table('turista')
        ->join('personas', 'turista.IdPersona', '=', 'personas.IdPersona')
        ->join('users', 'personas.IdPersona', '=', 'users.IdPersona')
        ->where([
          [DB::raw('EXTRACT(MONTH FROM FechaNacimiento)'), '=', $mes_actual],
          ['EstadoUsuario', '=', '1'],
         ])
        ->count();

      $mes_actual=DateTime::createFromFormat('!m', $mes_actual);
      $mes_actual=strftime("%B",$mes_actual->getTimestamp());
      $mes_actual=ucfirst($mes_actual);

      //Últimos usuarios registrados
      $ultimos_usuarios= DB::table('users')
        ->select('name',
          DB::raw("DATE_FORMAT(created_at, '%d %b %H:%i') as fecha"),
          'avatar')
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();

      //Grafica de nuevos usuarios por mes durante el 2018
      $nuevos_usuarios= DB::table('users')
        ->select(
          DB::raw('EXTRACT(MONTH FROM created_at) as mes'),
          DB::raw('COUNT(EXTRACT(MONTH FROM created_at)) as number')
          )
        ->where(
          DB::raw('EXTRACT(YEAR FROM created_at)'), '=', 2018)
        ->groupBy(
          DB::raw('EXTRACT(MONTH FROM created_at)')
          )
        ->orderBy('mes','asc')
        ->get();

        $nuevosarray[] = ['Mes', 'Usuarios'];
        foreach($nuevos_usuarios as $key => $value)
        {
          $value->mes=DateTime::createFromFormat('!m', $value->mes);
          $value->mes=strftime("%B",$value->mes->getTimestamp());
          $value->mes=ucfirst($value->mes);
        }
        foreach($nuevos_usuarios as $key => $value)
        {
         $nuevosarray[++$key] = [$value->mes, $value->number];
        }

        //Tipos de Pago
       $tipospago = DB::table('pago')
         ->select(
          DB::raw('TipoPago as tipo'),
          DB::raw('count(*) as number'))
         ->groupBy('tipo')
         ->get();

       $tiposarray[] = ['Tipo', 'Numero'];
       foreach($tipospago as $key => $value)
       {
          $tiposarray[++$key] = [$value->tipo, $value->number];
       }


     return view('graficas.index')
            ->with('genero', json_encode($array))
            ->with('pais', json_encode($paisesarray))
            ->with('paquete', json_encode($paquetesarray))
            ->with('categorias', json_encode($categoriasarray,JSON_UNESCAPED_UNICODE))
            ->with('costos', json_encode($costosarray))
            ->with('cumples', $cumples)
            ->with('total_cumples', $total_cumples)
            ->with('mes_actual', $mes_actual)
            ->with('usuarios', $ultimos_usuarios)
            ->with('nuevos_usuarios',  json_encode($nuevosarray,JSON_UNESCAPED_UNICODE))
            ->with('tipospago', json_encode($tiposarray));
    }
}
