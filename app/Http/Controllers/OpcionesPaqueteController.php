<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\GastosExtrasPaquete;
use App\IncluyePaquete;
use App\CondicionesPaquete;
use App\RecomendacionesPaquete;
use App\ItinerarioPaquete;
use App\GastosExtras;
use App\Recomendaciones;
use App\Incluye;
use App\Condiciones;
use App\Itinerario;
use DB;


class OpcionesPaqueteController extends Controller
{
    public function index()
    {
      $gastosextras = GastosExtras::all();
    //Para el rdenamiento en la tabla index

        return view('adminRutaTuristica.index',compact('gastosextras'));
    }

    public function create()
    {
      $gastosextras = GastosExtras::all();
      $recomendaciones = Recomendaciones::all();
      $incluye= Incluye::all();
      $condiciones=Condiciones::all();
      $itinerario=Itinerario::all();
      return view('adminOpcionesPaquete.create',compact('gastosextras','incluye','condiciones','recomendaciones','itinerario'));

    }
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
       return back()->with('status',"Agregado con éxito");
          } catch(\Exception $e){
       return back()->with('fallo',"Error ya existe gasto extra");
     }

    }
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
             return back()->with('status',"Agregado con éxito");
                } catch(\Exception $e){
             return back()->with('fallo',"Error ya existe que incluye");
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
           return back()->with('status',"Agregado con éxito");
              } catch(\Exception $e){
            return back()->with('fallo',"Error ya existe recomendación");
          }
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
            return back()->with('status',"Agregado con éxito");
              } catch(\Exception $e){
            return back()->with('fallo',"Error ya existe condición");
            }
          }
        public function guardaritinerario(Request $request){
         try{
           $this->validate($request,array(
             'itinerario'=>'required|string|unique:Itinerario,NombreItinerario',
           ));
            $itinerario=new Itinerario;
            $itinerario->NombreItinerario = $request->itinerario;
            $itinerario->save();
            return back()->with('status',"Agregado con éxito");
               } catch(\Exception $e){
            return back()->with('fallo',"Error ya existe actividad de itinerario");
           }
          }

        public function eliminargastosextras($id){
            $gastosextras=GastosExtras::findOrFail($id);
            $gastospaquete=GastosExtrasPaquete::where('gastosextras_id',$id)->get()->first();
            if ($gastospaquete==null) {
              $gastosextras->delete();
              return back()->with('status',"Eliminado con éxito");
                }else {
              return back()->with('fallo',"Error gasto extra es parte de un paquete no se puede eliminar");
                }
             }
        public function eliminarincluye($id){
               $incluye=Incluye::findOrFail($id);
               $incluyepaquete=IncluyePaquete::where('incluye_id',$id)->get()->first();
               if($incluyepaquete==null){
                    $incluye->delete();
                    return back()->with('status',"Eliminado con éxito");
                  }else {
                    return back()->with('fallo',"Error gasto extra es parte de un paquete no se puede eliminar");
                  }
              }
              public function eliminarrecomendaciones($id){
                   $recomendaciones=Recomendaciones::findOrFail($id);
                   $recomendacionespaquete=RecomendacionesPaquete::where('recomendaciones_id',$id)->get()->first();
                   if($recomendacionespaquete==null){
                   $recomendaciones->delete();
                   return back()->with('status',"Eliminado con éxito");
                 }else {
                   return back()->with('fallo',"Error gasto extra es parte de un paquete no se puede eliminar");
                 }
                }
              public function eliminarcondiciones($id){
                    $condiciones=Condiciones::findOrFail($id);
                    $condicionespaquete=CondicionesPaquete::where('condiciones_id',$id)->get()->first();
                    if($condicionespaquete==null){
                        $condiciones->delete();
                          return back()->with('status',"Eliminado con éxito");
                        }else {
                          return back()->with('fallo',"Error gasto extra es parte de un paquete no se puede eliminar");
                     }
                    }
              public function eliminaritinerario($id){
                    $itinerario=Itinerario::findOrFail($id);
                    $itinerariopaquete=ItinerarioPaquete::where('itinerario_id',$id)->get()->first();
                    if($itinerariopaquete==null){
                          $itinerario->delete();
                           return back()->with('status',"Eliminado con éxito");
                         }else {
                           return back()->with('fallo',"Error gasto extra es parte de un paquete no se puede eliminar");
                         }
                      }

}
