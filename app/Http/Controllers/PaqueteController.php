<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Condiciones;
use App\Pais;
use Input;
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
use App\ImagenPaqueteTuristico;




class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


      $paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','asc')->paginate(5);
      /*$paquetes = Paquete::sortable()->paginate(5);*/


    /*$nombre = $request->get('nombrepaquete');*/

    /*  $paquete = Paquete::paginate(5);
*/

        return view('adminPaquete.index',compact('paquetes'));
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
        $paquete->TipoPaquete=$request->tipopaquete;
        $paquete->Cupos=$request->cupos;
        $paquete->Dificultad=$request->dificultad;
        $paquete->Itinerario=$request->itinerario;
        $paquete->AprobacionPaquete=$request->aprobacionpaquete;
        $paquete->DisponibilidadPaquete=$request->disponibilidadpaquete;
        $paquete->save();

        $paquete2 = Paquete::latest('IdPaquete')->first();

        $archivo = $request->file('imagenpaquete');
            for($i=0;$i<count($archivo);$i++){
            //dd($archivo);
            //Hay Imagen

            $nombreimagen[$i] = 'paquete_'. $paquete2->IdPaquete .'_'. $archivo[$i]->getClientOriginalName();

            $path[$i] = public_path() . "/storage/imagenesPaquete";

            $archivo[$i]->move($path[$i] , $nombreimagen[$i]);

            $imagen[$i] = new ImagenPaqueteTuristico();

            $imagen[$i]->id_paquete = $paquete2->IdPaquete;
            $imagen[$i]->Imagen1 = $nombreimagen[$i];



            $imagen[$i]->save();
            }

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
    public function edit($id, Request $request)
    {


      /*si necesitamos modificar la ruta turistica debemos cambiar esta
      linea ++  $ruta = RutaTuristica::where('IdRutaTuristica', $ruta2)->get(); ++
      por esta linea ++  */
      $paquete=Paquete::findOrFail($id);
      $ruta =RutaTuristica::all();
      $imagenes = ImagenPaqueteTuristico::where('id_paquete',$id)->get();
      $imagenes2 = $imagenes->all();
      //$imagenes = ImagenPaqueteTuristico::findOrFail(10);

      return view('adminPaquete.edit')
      ->with('paquete',$paquete)
      ->with('ruta',$ruta)
        ->with('imagen',$imagenes2);
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
        $paquete->IdTuristica=$request->idrutaturistica;
        $paquete->NombrePaquete=$request->nombrepaquete;
        $paquete->FechaSalida=$request->fechasalida;
        $paquete->HoraSalida=$request->hora;
        $paquete->FechaRegreso=$request->fecharegreso;
        $paquete->LugarRegreso=$request->lugarsalida;
        $paquete->Precio=$request->precio;
        $paquete->TipoPaquete=$request->tipopaquete;
        $paquete->Cupos=$request->cupos;
        $paquete->Dificultad=$request->dificultad;
        $paquete->Itinerario=$request->itinerario;




        $paquete->save();



/*
        if($request->gastosextras =! null){
          for ($i=0; $i<count($request->gastosextras);$i++){
            $gastoSpaquete = new GastosExtrasPaquete();
            $gastospaquete = GastosExtrasPaquete::where('paquete_id',$paquete->IdPaquete)->get();

            if($gastospaquete=! null){
              $gastospaquete->gastosextras_id = $request->gastosextras[$i];
              $gastospaquete->save();
            }else{
              $gastospaquete = new GastosExtrasPaquete();
              $gastospaquete->paquete_id = $paquete->IdPaquete;
              $gastospaquete->gastosextras_id = $request->gastosextras[$i];
              $gastospaquete->save();
            }
        }
      }else{
        $gastospaquete = GastosExtrasPaquete::where('paquete_id',$paquete->IdPaquete)->get();
        $gastospaquete->delete();
      }


        for ($i=0; $i<count($request->condiciones);$i++){
          $condicionespaquete = new CondicionesPaquete();
          $condicionespaquete->paquete_id = $paquete->IdPaquete;
          $condicionespaquete->condiciones_id = $request->condiciones[$i];
          $condicionespaquete->save();
        }

        for ($i=0; $i<count($request->recomendaciones);$i++){
          $recomendacionespaquete = new RecomendacionesPaquete();
          $recomendacionespaquete->paquete_id =$paquete->IdPaquete;
          $recomendacionespaquete->recomendaciones_id = $request->recomendaciones[$i];
          $recomendacionespaquete->save();
        }
        for ($i=0; $i<count($request->incluye);$i++){
          $incluyepaquete = new IncluyePaquete();
          $incluyepaquete->paquete_id = $paquete->IdPaquete;
          $incluyepaquete->incluye_id = $request->incluye[$i];
          $incluyepaquete->save();
        }
*/

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
    /*
public fuction postNewImage(Request $request){
  $this->validate($request,['Imagen1','Imagen2','Imagen3','Imagen4','Imagen5'=>'required|image']);
*/


}
