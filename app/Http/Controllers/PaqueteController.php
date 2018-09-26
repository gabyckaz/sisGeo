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
use App\Transporte;
use App\Conductor;




class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


      $paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','desc')->paginate(5);
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
     * Muestra todos los paquetes al cliente
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);

      $imagenes = ImagenPaqueteTuristico::all();

      return view('welcome')
      ->with('imagenes',$imagenes)
      ->with('paquetes',$paquetes);

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

    /**
     * Muestra la información de 1 paquete al cliente
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSingle($id)
    {
      $paquete= Paquete::where('IdPaquete','=',$id)->first();

      //Trae las condiciones relacionadas al paquete
      $condiciones = CondicionesPaquete::where('paquete_id',$id)->get();
      $condiciones = $condiciones->all();
      //Trae las recomendaciones relacionadas al paquete
      $recomendaciones = RecomendacionesPaquete::where('paquete_id',$id)->get();
      $recomendaciones = $recomendaciones->all();
      //Trae los gastos extra relacionadas al paquete
      $gastosextras = GastosExtrasPaquete::where('paquete_id',$id)->get();
      $gastosextras = $gastosextras->all();
      //Trae los 'incluye' relacionadas al paquete
      $incluye = IncluyePaquete::where('paquete_id',$id)->get();
      $incluye = $incluye->all();
      //Trae las imagenes relacionadas al paquete
      $imagenes = ImagenPaqueteTuristico::where('id_paquete',$id)->get();
      $imagenes2 = $imagenes->all();

      return view('adminPaquete.single')
      ->with('paquete',$paquete)
      ->with('condiciones',$condiciones)
      ->with('recomendaciones',$recomendaciones)
      ->with('gastosextras',$gastosextras)
      ->with('incluye',$incluye)
      ->with('imagen',$imagenes2);

    }

    /**
     * Muestra la pantalla para agregar transporte y conductor a 1 paquete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edittransporte($id)
    {
      $paquete= Paquete::where('IdPaquete','=',$id)->first();
      $transportes =Transporte::all();
      $conductores =Conductor::all();

      $consulta = DB::table('Contrata')
            ->join('Transporte', 'Contrata.IdTransporte', '=', 'Transporte.IdTransporte')
            ->select('Transporte.NumeroAsientos')
            ->where('Contrata.IdPaquete','=',$id)
            ->get();

      $consultaconductor= DB::table('Conduce')
            ->join('Conductor', 'Conduce.IdConductor', '=', 'Conductor.IdConductor')
            ->select('Conductor.NombreConductor')
            ->where('Conduce.IdPaquete','=',$id)
            ->get();

      return view('adminPaquete.show')
      ->with('transportes',$transportes)
      ->with('conductores',$conductores)
      ->with('paquete',$paquete)
      ->with('consulta',$consulta)
      ->with('consultaconductor',$consultaconductor);

    }

    /**
     * Guarda las asignaciones de transporte en la BD
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function asignartransporte($paquete, Request $request)
    {
      try{
        $transporte = Transporte::find($request->get('transporte'));
        // insert into "Contrata" ("IdPaquete", "IdTransporte") values (5, 25)
        $transporte->paquetes()->attach($paquete);

        $paquete= Paquete::where('IdPaquete','=',$paquete)->first();
        $transportes =Transporte::all();
        $conductores =Conductor::all();
        $paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','asc')->paginate(5);

        return back()
        ->with('paquetes',$paquetes)
        ->with('status',"Asignado exitosamente");
      } catch(\Exception $e) {
        return back()->with('fallo', "Ya tiene asignado el transporte de ". $transporte->tipotransporte->NombreTipoTransporte." de". $transporte->EmpresaAlquilerTransporte->NombreEmpresaTransporte);
      }
    }

      /**
       * Guarda las asignaciones de conductores en la BD
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function asignarconductor($paquete, Request $request)
      {
        try{
          $conductor = Conductor::find($request->get('conductor'));
          // insert into "Conduce" ("IdPaquete", "IdConductor") values (5, 25)
          $conductor->paquetescon()->attach($paquete);

          $paquete= Paquete::where('IdPaquete','=',$paquete)->first();
          $transportes =Conductor::all();
          $conductores =Conductor::all();
          $paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','asc')->paginate(5);

          return back()
          ->with('paquetes',$paquetes)
          ->with('status',"Asignado exitosamente");
        } catch(\Exception $e) {
          return back()->with('fallo', "Ya tiene asignado al conductor ".$conductor->NombreConductor);
        }

    }


}
