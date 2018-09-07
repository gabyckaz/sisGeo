<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Condiciones;
use App\Pais;
use App\Recomendaciones;
use App\Incluye;
use App\Departamento;
use App\RutaTuristica;
use App\Paquete;
use App\GastosExtras;
use App\RecomendacionesPaquete;
use App\IncluyePaquete;
use App\GastosExtrasPaquete;
use App\CondicionesPaquete;
use Illuminate\Support\Facades\Input;


class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $paquete = Paquete::nombre($request->get('nombre'))
      ->orderBy('IdPaquete','asc')->paginate(2);
      $nombre = $request->get('nombrepaquete');



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
        $pais=Pais::all();
        $departamento=Departamento::all();
        $gastosextras=GastosExtras::all();
        $incluye=Incluye::all();
        $condiciones=Condiciones::all();
        $recomendaciones=Recomendaciones::all();
        return view('adminPaquete.create')
        ->with('ruta',$rutaturistica)->with('pais',$pais)
        ->with('departamento',$departamento)->with('gastosextras',$gastosextras)
        ->with('incluye',$incluye)->with('condiciones',$condiciones)->with('recomendaciones',$recomendaciones);


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
        $paquete->IdTuristica=$request->idrutaturistica;
        $paquete->NombrePaquete=$request->nombrepaquete;
        $paquete->FechaSalida=$request->fechasalida;
        $paquete->HoraSalida=$request->hora;
        $paquete->FechaRegreso=$request->fecharegreso;
        $paquete->LugarRegreso=$request->lugarsalida;
        $paquete->Precio=$request->precio;
        $paquete->Itinerario=$request->itinerario;
        $paquete->AprobacionPaquete=$request->aprobacionpaquete;
        $paquete->DisponibilidadPaquete=$request->disponibilidadpaquete;
        $paquete->save();

        $paquete2 = Paquete::latest('IdPaquete')->first();

        for ($i=0; $i<count($request->gastosextras);$i++){
          $gastospaquete = new GastosExtrasPaquete();
          $gastospaquete->paquete_id = $paquete2->IdPaquete;
          $gastospaquete->gastosextras_id = $request->gastosextras[$i];
          $gastospaquete->save();
        }


        for ($i=0; $i<count($request->condiciones);$i++){
          $condicionespaquete = new CondicionesPaquete();
          $condicionespaquete->paquete_id = $paquete2->IdPaquete;
          $condicionespaquete->condiciones_id = $request->condiciones[$i];
          $condicionespaquete->save();
        }

        for ($i=0; $i<count($request->recomendaciones);$i++){
          $recomendacionespaquete = new RecomendacionesPaquete();
          $recomendacionespaquete->paquete_id =$paquete2->IdPaquete;
          $recomendacionespaquete->recomendaciones_id = $request->recomendaciones[$i];
          $recomendacionespaquete->save();
        }
        for ($i=0; $i<count($request->incluye);$i++){
          $incluyepaquete = new IncluyePaquete();
          $incluyepaquete->paquete_id = $paquete2->IdPaquete;
          $incluyepaquete->incluye_id = $request->incluye[$i];
          $incluyepaquete->save();
        }


        $rutaturistica=RutaTuristica::all();
        $pais=Pais::all();
        $departamento=Departamento::all();
        $gastosextras=GastosExtras::all();
        $incluye=Incluye::all();
        $condiciones=Condiciones::all();
        $recomendaciones=Recomendaciones::all();
        return view('adminPaquete.create')
        ->with('ruta',$rutaturistica)->with('pais',$pais)
        ->with('departamento',$departamento)->with('gastosextras',$gastosextras)
        ->with('incluye',$incluye)->with('condiciones',$condiciones)->with('recomendaciones',$recomendaciones);

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
        return view('adminPaquete.edit', compact('paquete', 'ruta','gastosextras'));
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
