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
      $gastosextras = GastosExtras::orderBy('IdGastosExtras','desc')->paginate(5);
    //Para el rdenamiento en la tabla index

        return view('adminRutaTuristica.index',compact('gastosextras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $gastosextras = GastosExtras::orderBy('IdGastosExtras','desc')->paginate(10);
      $recomendaciones = Recomendaciones::orderBy('IdRecomendaciones','desc')->paginate(10);
      $incluye= Incluye::orderBy('IdIncluye','desc')->paginate(10);
      $condiciones=Condiciones::orderBy('IdCondiciones','desc')->paginate(10);
      $itinerario=Itinerario::orderBy('IdItinerario','desc')->paginate(10);
      return view('adminOpcionesPaquete.create',compact('gastosextras','incluye','condiciones','recomendaciones','itinerario'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      try{
        $this->validate($request,array(

          'gastosextras'=>'required|string|unique:GastosExtras,NombreGastos',
          'gastos'=>'required:GastosExtras,Gastos',
        ));

       //Guardar en la BD

       //Relacionando campo de BD con formulario
       //campo de BD -> campo del formulario
       $gastosextras=new GastosExtras;
       $gastosextras->NombreGastos = $request->gastosextras;
       $gastosextras->Gastos= $request->gastos;
       $gastosextras->save();
       return redirect('CrearOpcionesPaquete')->with('status',"Agregado con éxito");
          } catch(\Exception $e){
       return redirect('CrearOpcionesPaquete')->with('fallo',"Error ya existe gasto extra");
     }

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
     try{
       $this->validate($request,array(

         'incluye'=>'required|string|unique:Incluye,NombreIncluye',
       ));

             $incluye=new Incluye;
             $incluye->NombreIncluye = $request->incluye;

             $incluye->save();
             return redirect('CrearOpcionesPaquete')->with('status',"Agregado con éxito");
                } catch(\Exception $e){
             return redirect('CrearOpcionesPaquete')->with('fallo',"Error ya existe que incluye");
            }

    }
 public function guardarrecomendaciones(Request $request){
   try{
     $this->validate($request,array(

       'recomendaciones'=>'required|string|unique:Recomendaciones,NombreRecomendaciones',
     ));
      $recomendaciones=new Recomendaciones;
      $recomendaciones->NombreRecomendaciones = $request->recomendaciones;
      $recomendaciones->save();
      return redirect('CrearOpcionesPaquete')->with('status',"Agregado con éxito");
         } catch(\Exception $e){
      return redirect('CrearOpcionesPaquete')->with('fallo',"Error ya existe recomendación");
     }
    /*  return view('adminOpcionesPaquete.create')->with('recomendaciones',$recomendaciones);*/
    }
    public function guardarcondiciones(Request $request)
    {
      try{
        $this->validate($request,array(
          'condiciones'=>'required|string|unique:Condiciones,NombreCondiciones',
        ));

         $condiciones=new Condiciones;
         $condiciones->NombreCondiciones = $request->condiciones;
         $condiciones->save();
         return redirect('CrearOpcionesPaquete')->with('status',"Agregado con éxito");
            } catch(\Exception $e){
         return redirect('CrearOpcionesPaquete')->with('fallo',"Error ya existe condición");
        }
       /*  return view('adminOpcionesPaquete.create')->with('recomendaciones',$recomendaciones);*/
       }

       public function guardaritinerario(Request $request){
         try{
           $this->validate($request,array(
             'itinerario'=>'required|string|unique:Itinerario,NombreItinerario',
           ));
            $itinerario=new Itinerario;
            $itinerario->NombreItinerario = $request->itinerario;
            $itinerario->save();
            return redirect('CrearOpcionesPaquete')->with('status',"Agregado con éxito");
               } catch(\Exception $e){
            return redirect('CrearOpcionesPaquete')->with('fallo',"Error ya existe actividad de itinerario");
           }
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
