<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\CostoAlquilerTransporte;
use DB;

class CostoAlquilerTransporteController extends Controller
{
    /*
    *Método del index de paquetes para asignar costos del transporte
    *
    */
    public function index(Request $request)
    {
      $paquetes = Paquete::all();
      return view('adminPaquete.costos.index',compact('paquetes'));
    }

    /*
    *Método para asignar costos del transporte
    *
    */
    public function create(Request $request, $id)
    {
      $paquete = Paquete::findOrFail($id);
      $costo= DB::table('CostoAlquilerTransporte')->where('IdPaquete', $id)->value('CostoAlquilerTransporte');
      return view('adminPaquete.costos.create',compact('paquete','costo'));
    }

    /*
    *Método para guardar o actualizar los costos del transporte
    *
    */
    public function store(Request $request,$id)
    {
        $costo= DB::table('CostoAlquilerTransporte')->where('IdPaquete', $id)->exists(); //consulta si ya existe un registro de costos con este paquete
        if($costo){//si ya existe hace un update
          $this->validate($request,array(
            'precio'=>'required|min:2|max:7'
          ));
          $IdCostoAlquilerTransporte= DB::table('CostoAlquilerTransporte')->where('IdPaquete', $id)->value('IdCostoAlquilerTransporte');
          $costo = CostoAlquilerTransporte::find($IdCostoAlquilerTransporte);
          $costo->IdPaquete=$id;
          $costo->CostoAlquilerTransporte=$request->precio;
          $costo->save();
          return redirect('/PaquetesCostos')->with('status', "Actualizado con éxito");
        }else{//si no, se guarda como nuevo registro
          $this->validate($request,array(
            'precio'=>'required|min:2|max:7'
          ));
          $costo = new CostoAlquilerTransporte;
          $costo->IdPaquete=$id;
          $costo->CostoAlquilerTransporte=$request->precio;
          $costo->save();
          return redirect('/PaquetesCostos')->with('status', "Guardado con éxito");
        }
    }

    /*
    * Método para mostrar los 10 paquetes más costosos
    *
    */
    public function reporte()
    {
      $costos = DB::table('CostoAlquilerTransporte')
            ->join('Paquetes', 'CostoAlquilerTransporte.IdPaquete', '=', 'Paquetes.IdPaquete')
            ->select('Paquetes.NombrePaquete','FechaSalida', 'CostoAlquilerTransporte.CostoAlquilerTransporte')
            ->orderBy('CostoAlquilerTransporte', 'desc')
            ->limit(10)
            ->get();
      return view('adminPaquete.costos.reporte',compact('costos'));
    }

}
