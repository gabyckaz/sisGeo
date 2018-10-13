<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\GastosExtras;
use App\Recomendaciones;
use App\Incluye;
use App\Condiciones;
use App\Itinerario;
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
      $gastosextras = GastosExtras::orderBy('IdRutaTuristica','desc')->paginate(5);//Para el rdenamiento en la tabla index
      return view('/CrearOpcionesPaquete',compact('gastosextras'));
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
      $itinerario=Itinerario::all();
      return view('adminOpcionesPaquete.create')->with('gastosextras',$gastosextras)
      ->with('incluye',$incluye)->with('condiciones',$condiciones)->with('recomendaciones',$recomendaciones)->with('itinerario',$itinerario);
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
       $gastosextras->Gastos= $request->gastos;

       $gastosextras->save();

       return back();


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
        $paquete=Paquete::findOrFail($id);
        $paquete->delete();

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
    public function guardarcondiciones(Request $request){

         $condiciones=new Condiciones;
         $condiciones->NombreCondiciones = $request->condiciones;
         $condiciones->save();
               return back();
       /*  return view('adminOpcionesPaquete.create')->with('recomendaciones',$recomendaciones);*/
       }

       public function guardaritinerario(Request $request){

            $itinerario=new Itinerario;
            $itinerario->NombreItinerario = $request->itinerario;
            $itinerario->save();
                  return back();
          /*  return view('adminOpcionesPaquete.create')->with('recomendaciones',$recomendaciones);*/
          }

          public function eliminargastosextras($id){

            $gastosextras=GastosExtras::findOrFail($id);
            $gastosextras->delete();
            return back();


             }
          public function eliminarincluye($id){

               $incluye=Incluye::findOrFail($id);
               $incluye->delete();
               return back();

              }
              public function eliminarrecomendaciones($id){

                   $recomendaciones=Recomendaciones::findOrFail($id);
                   $recomendaciones->delete();
                   return back();


                  }
                  public function eliminarcondiciones($id){

                       $condiciones=Condiciones::findOrFail($id);
                       $condiciones->delete();
                       return back();
                      }
                      public function eliminaritinerario($id){

                           $itinerario=Itinerario::findOrFail($id);

                           $itinerario->delete();
                           return back();
                          }


}
