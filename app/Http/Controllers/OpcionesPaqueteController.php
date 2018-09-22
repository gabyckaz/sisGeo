<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\GastosExtras;
use App\Recomendaciones;
use App\Incluye;
use App\Condiciones;
use DB;


class OpcionesPaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $gastosextras = GastosExtras::all();
      $recomendaciones = Recomendaciones::all();
      $incluye= Incluye::all();
      $condiciones=Condiciones::all();
      return view('adminOpcionesPaquete.create')->with('gastosextras',$gastosextras)
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


       //Guardar en la BD

       //Relacionando campo de BD con formulario
       //campo de BD -> campo del formulario
       $gastosextras=new GastosExtras;
       $gastosextras->NombreGastos = $request->gastosextras;

       $gastosextras->save();
       $gastosextras3 = GastosExtras::all();
        return view('adminOpcionesPaquete.create')->with('gastosextras',$gastosextras3);


    }


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

   public function guardarincluye(Request $request){

             $incluye=new Incluye;
             $incluye->NombreIncluye = $request->incluye;

             $incluye->save();
    
                   return back();
             /*return view('adminOpcionesPaquete.create')->with('incluye',$incluye3);*/

    }
 public function guardarrecomendaciones(Request $request){

      $recomendaciones=new Recomendaciones;
      $recomendaciones->NombreRecomendaciones = $request->recomendaciones;
      $recomendaciones->save();
            return back();
    /*  return view('adminOpcionesPaquete.create')->with('recomendaciones',$recomendaciones);*/
    }
/*    public function guardargastosextras(Request $request){
      $gastosextras=new GastosExtras;
      $gastosextras->NombreGastos = $request->gastosextras;

      $gastosextras->save();
      $gastosextras3 = GastosExtras::all();
          return view('adminOpcionesPaquete.create')->with('gastosextras',$gastosextras3);
    }*/
}
