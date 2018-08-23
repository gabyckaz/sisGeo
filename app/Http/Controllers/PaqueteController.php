<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RutaTuristica;
use App\Paquete;
use Illuminate\Support\Facades\Input;


class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquete=Paquete::all();
        return view('adminPaquete.index')
        ->with('paquete',$paquete);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutaturistica=RutaTuristica::all();
        return view('adminPaquete.create')
        ->with('ruta',$rutaturistica);
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $paquete=new Paquete();
        $paquete->IdRutaTuristica=$request->idrutaturistica;
        $paquete->IdTuristica=$request->idrutaturistica;
        $paquete->NombrePaquete=$request->nombrepaquete;
        $paquete->FechaSalida=$request->fechasalida;
        $paquete->HoraSalida=$request->hora;
        $paquete->FechaRegreso=$request->fecharegreso;
        $paquete->LugarRegreso=$request->lugarsalida;
        $paquete->Precio=$request->precio;
        $paquete->Itinerario=$request->itinerario;
        $paquete->GastosExtras=$request->gastosextras;
        $paquete->Incluye=$request->queincluye;
        $paquete->Condiciones=$request->condiciones;
        $paquete->Recomendaciones=$request->recomendaciones;
        $paquete->AprobacionPaquete=$request->aprobacionpaquete;
        $paquete->DisponibilidadPaquete=$request->disponibilidadpaquete;
        $paquete->save();

        $rutaturistica=RutaTuristica::all();
        
            return view('adminPaquete.create')->with('ruta',$rutaturistica);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $ruta= RutaTuristica::all();   
     $paquete=Paquete::findOrFail($id);
        return view('adminPaquete.edit', compact('paquete', 'ruta'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        $paquete = Paquete::findOrFail($id);
        $paquete->IdRutaTuristica=$request->idrutaturistica;
        $paquete->IdTuristica=$request->idrutaturistica;
        $paquete->NombrePaquete=$request->nombrepaquete;
        $paquete->FechaSalida=$request->fechasalida;
        $paquete->HoraSalida=$request->hora;
        $paquete->FechaRegreso=$request->fecharegreso;
        $paquete->LugarRegreso=$request->lugarsalida;
        $paquete->Precio=$request->precio;
        $paquete->Itinerario=$request->itinerario;
        $paquete->GastosExtras=$request->gastosextras;
        $paquete->Incluye=$request->queincluye;
        $paquete->Condiciones=$request->condiciones;
        $paquete->Recomendaciones=$request->recomendaciones;
        $paquete->AprobacionPaquete=$request->aprobacionpaquete;
        $paquete->DisponibilidadPaquete=$request->disponibilidadpaquete;
        $paquete->save();
        

        $paquetes=Paquete::all();
        return view('adminPaquete.index')
        ->with('paquete',$paquetes);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
