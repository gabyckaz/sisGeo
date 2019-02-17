<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Exporter;
use Illuminate\Support\Collection;

class ReporteController extends Controller
{
    /**
    *  Método de vista principal
    *
    **/
    public function index(){
      return view('reportes.index');
    }

    /**
    *  Método para preview de datos
    *
    **/
    public function show(Request $request){

      $this->validate($request,array(
          'tiporeporte'=>'required',
          'fechaInicio'=>'required|date|before_or_equal:fechaFin',
          //para mientras ver lidtados 'fechaFin'=>'required|date|before_or_equal:today',
          'fechaFin'=>'required|date|after_or_equal:fechaInicio',
      ));

      $tipo=$request->tiporeporte;
      $fechainicio=$request->fechaInicio;
      $fechafin=$request->fechaFin;

      switch ($tipo) {
        case 'Paquetesrealizados':
            $paquetes = DB::table('paquetes')
              ->leftjoin('costoalquilertransporte', 'paquetes.IdPaquete', '=', 'costoalquilertransporte.IdPaquete')
              ->join('rutaturistica', 'paquetes.IdTuristica', '=', 'rutaturistica.IdRutaTuristica')
              ->join('pais', 'rutaturistica.IdPais', '=', 'pais.IdPais')
              ->join('categoria', 'rutaturistica.IdCategoria', '=', 'categoria.IdCategoria')
              ->select('NombrePaquete','FechaSalida','Precio','Cupos','CostoAlquilerTransporte','nombrePais','NombreCategoria')
              ->orderBy('FechaSalida', 'asc')
              ->where([
                ['FechaSalida', '>=', $fechainicio],
                ['FechaSalida', '<=', $fechafin],
                ['DisponibilidadPaquete', '=', '1']
               ])
              ->get();
            $totalpaquetes= DB::table('paquetes')
              ->leftjoin('costoalquilertransporte', 'paquetes.IdPaquete', '=', 'costoalquilertransporte.IdPaquete')
              ->join('rutaturistica', 'paquetes.IdTuristica', '=', 'rutaturistica.IdRutaTuristica')
              ->join('pais', 'rutaturistica.IdPais', '=', 'pais.IdPais')
              ->join('categoria', 'rutaturistica.IdCategoria', '=', 'categoria.IdCategoria')
              ->orderBy('FechaSalida', 'asc')
              ->where([
                ['FechaSalida', '>=', $fechainicio],
                ['FechaSalida', '<=', $fechafin],
                ['DisponibilidadPaquete', '=', '1']
               ])
              ->count();
            return view('reportes.paquetes',compact('paquetes','fechainicio','fechafin','totalpaquetes'));
            break;

        case 'Pagos':
            $pagos = DB::table('pago')
              ->select('Descripcion','CostoPersona','NombreCliente','Estado','NAP','PagoTotal','TipoPago','NumeroAcompanante','FechaTransaccion')
              ->orderBy('FechaTransaccion', 'asc')
              ->whereBetween('FechaTransaccion', [$fechainicio, $fechafin])
              ->get();
            $totalpagos = DB::table('pago')
              ->orderBy('FechaTransaccion', 'asc')
              ->whereBetween('FechaTransaccion', [$fechainicio, $fechafin])
              ->count();
          return view('reportes.pagos',compact('pagos','fechainicio','fechafin','totalpagos'));
            break;

        case 'Usuarios':
            $usuarios = DB::table('users')
              ->select('email','avatar','RecibirNotificacion','EstadoUsuario','PrimerNombrePersona','SegundoNombrePersona','PrimerApellidoPersona','SegundoApellidoPersona','Genero','AreaTelContacto','TelefonoContacto','users.created_at')
              ->join('personas', 'users.IdPersona', '=', 'personas.IdPersona')
              ->orderBy('users.created_at', 'asc')
              ->whereBetween('users.created_at', [$fechainicio, $fechafin])
              ->get();
            $totalusuarios = DB::table('users')
              ->join('personas', 'users.IdPersona', '=', 'personas.IdPersona')
              ->orderBy('users.created_at', 'asc')
              ->whereBetween('users.created_at', [$fechainicio, $fechafin])
              ->count();
          return view('reportes.usuarios',compact('usuarios','fechainicio','fechafin','totalusuarios'));
            break;
      }

    }

    /**
    *  Método para generación del excel de paquetes
    *
    **/
    public function paquetesexcel($fechainicio,$fechafin){
      //consulta
      $paquetes = DB::table('paquetes')
        ->leftjoin('costoalquilertransporte', 'paquetes.IdPaquete', '=', 'costoalquilertransporte.IdPaquete')
        ->join('rutaturistica', 'paquetes.IdTuristica', '=', 'rutaturistica.IdRutaTuristica')
        ->join('pais', 'rutaturistica.IdPais', '=', 'pais.IdPais')
        ->join('categoria', 'rutaturistica.IdCategoria', '=', 'categoria.IdCategoria')
        ->select('NombrePaquete','Precio','Cupos','CostoAlquilerTransporte','NombreCategoria','nombrePais','FechaSalida')
        ->orderBy('FechaSalida', 'asc')
        ->where([
          ['FechaSalida', '>=', $fechainicio],
          ['FechaSalida', '<=', $fechafin],
          ['DisponibilidadPaquete', '=', '1']
         ])
        ->get();
      //titulo de las columnas
      $columnas = array (
        "column_name"  => array("Nombre Paquete", "Precio ofertado", "Cupos ofertados","Costo total Transporte","Categoría","País","Fecha"),
      );
      //parseando las columnas a objetos
      $data= new collection();
      foreach ($columnas as $columna) {
        $data[0] = (object) $columna;
      }
      //uniendo las columnas con la consulta
      $data=$data->merge($paquetes);
      $timestamp=date("d-m-Y H:i:s");
      //generando archivo excel
      return Exporter::make('Excel')->load($data)->stream('Paquetes'.$timestamp.'.xlsx');
    }

    /**
    *  Método para generación del excel de paquetes
    *
    **/
    public function pagosexcel($fechainicio,$fechafin){
      //consulta
      $pagos = DB::table('pago')
        ->select('Descripcion','TipoPago','NAP','Estado','NombreCliente','CostoPersona','NumeroAcompanante','PagoTotal','FechaTransaccion')
        ->orderBy('FechaTransaccion', 'asc')
        ->whereBetween('FechaTransaccion', [$fechainicio, $fechafin])
        ->get();
      //titulo de las columnas
      $columnas = array (
        "column_name"  => array('Paquete', 'Tipo pago', 'Código Pagadito(NAP)','Estado pago','Cliente','Costo p/persona','No. acompañantes','Pago total','Fecha')
      );
      //parseando las columnas a objetos
      $data= new collection();
      foreach ($columnas as $columna) {
        $data[0] = (object) $columna;
      }
      //uniendo las columnas con la consulta
      $data=$data->merge($pagos);
      $timestamp=date("d-m-Y H:i:s");
      //generando archivo excel
      return Exporter::make('Excel')->load($data)->stream('Pagos'.$timestamp.'.xlsx');
    }

    /**
    *  Método para generación del excel de paquetes
    *
    **/
    public function usuariosexcel($fechainicio,$fechafin){
      //consulta
      $usuarios = DB::table('users')
        ->select('PrimerNombrePersona','SegundoNombrePersona','PrimerApellidoPersona','SegundoApellidoPersona','email','avatar','RecibirNotificacion','EstadoUsuario','Genero','AreaTelContacto','TelefonoContacto','users.created_at')
        ->join('personas', 'users.IdPersona', '=', 'personas.IdPersona')
        ->orderBy('users.created_at', 'asc')
        ->whereBetween('users.created_at', [$fechainicio, $fechafin])
        ->get();
      //titulo de las columnas
      $columnas = array (
        "column_name"  => array('Primer Nombre','Segundo Nombre','Primer Apellido','Segundo Apellido','Email', 'Avatar', 'Recibe correos','Estado usuario','Género','Código de país','No. teléfono','Fecha registro')
      );
      //parseando las columnas a objetos
      $data= new collection();
      foreach ($columnas as $columna) {
        $data[0] = (object) $columna;
      }
      //uniendo las columnas con la consulta
      $data=$data->merge($usuarios);
      $timestamp=date("d-m-Y H:i:s");
      //generando archivo excel
      return Exporter::make('Excel')->load($data)->stream('Usuarios'.$timestamp.'.xlsx');
    }
}
