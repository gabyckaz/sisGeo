<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RutaTuristica;

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
        return view('adminPaquete.create')
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
         /*$this->validate($request,array(
            'ruta'=>'required',
            'nombrepaquete'=>'required|max:100',
            'fechasalida'=>'required',
            'horasalida'=>'required',
            'fecharegreso'=>'required',
            'lugarregreso'=>'required|max:200',
            'precio'=>'required',
            'itinerario'=>'required|max:1024',
            'gastosextras'=>'required|max:1024',
            'incluye'=>'required|max:1024',
            'condiciones'=>'required|max:1024',
            'recomendaciones'=>'required|max:1024',
        ));
        $paquete=new Paquete;
        $paquete->IdRutaTuristica=$request->ruta;
        $paquete->NombrePaquete=$request->nombrepaquete;
        $paquete->FechaSalida=$request->fechasalida;
        $paquete->HoraSalida=$request->horasalida;
        $paquete->FechaRegreso=$request->fecharegreso;
        $paquete->LugarRegreso=$request->lugarregreso;
        $paquete->Precio=$request->precio;
        $paquete->Itinerario=$request->itinerario;
        $paquete->GastosExtras=$request->gastosextras;
        $paquete->Incluye=$request->incluye;
        $paquete->Condiciones=$request->condiciones;
        $paquete->Recomendaciones=$request->recomendaciones;
        $rutaturistica->save();
            return redirect('adminPaquete')->with('status',"Guardado con exito.")->withInput();*/

            //dd($request->all());


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
        //
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
        //
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
