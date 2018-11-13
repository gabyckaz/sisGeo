<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Condiciones;
use App\Pais;
use Input;
use App\Recomendaciones;
use App\Incluye;
use App\Itinerario;
use App\ItinerarioPaquete;
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
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Dompdf\Dompdf;


class PaqueteController extends Controller
{
    public function index(Request $request)
    {
        $paquetes = Paquete::all();
        return view('adminPaquete.index',compact('paquetes'));
    }

    public function create()
    {
        $rutaturistica=RutaTuristica::all();
        $pais=Pais::all();
        $departamento=Departamento::all();
        $gastosextras=GastosExtras::all();
        $incluye=Incluye::all();
        $condiciones=Condiciones::all();
        $recomendaciones=Recomendaciones::all();
        $itinerario=Itinerario::all();
        return view('adminPaquete.create')
        ->with('ruta',$rutaturistica)->with('pais',$pais)
        ->with('departamento',$departamento)->with('gastosextras',$gastosextras)
        ->with('incluye',$incluye)->with('condiciones',$condiciones)->with('recomendaciones',$recomendaciones)
        ->with('itinerario',$itinerario);
    }

    public function store(Request $request)
    {
     $this->validate($request,array(
       'nombrepaquete'=>'required',
       'fechasalida'=>'required',
       'hora'=>'required',
       'fecharegreso'=>'required',
       'lugarsalida'=>'required|max:200',
       'precio'=>'required',
       'tipopaquete'=>'required|max:20',
       'cupos'=>'required',
       'dificultad'=>'required|max:20',
        'video'=>'required',
        'galeria'=>'required',
     ));
       $hoystr = Carbon::now()->format('d-m-Y');
       $hoyObj = Carbon::parse($hoystr);
       $fechaSalidaObj = Carbon::parse($request->fechasalida);
       $fechaRegresoObj = Carbon::parse($request->fecharegreso);
        if($fechaSalidaObj <= $hoyObj  ){
          return redirect()->back()->withInput()->with('ErrorFs', 'Error en fecha');
        }elseif($fechaRegresoObj <= $hoyObj){
         return redirect()->back()->withInput()->with('ErrorFr', 'Error en fecha');
        }
        elseif($fechaRegresoObj < $fechaSalidaObj){
          return redirect()->back()->withInput()->with('ErrorFeschas', 'Error en fecha');
        }

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
          $paquete->Video=$request->video;
          $paquete->Galeria=$request->galeria;
          $paquete->Dificultad=$request->dificultad;
          $paquete->AprobacionPaquete="0";
          $paquete->DisponibilidadPaquete="1";
          $paquete->save();

          $archivo1=$request->file('imagen1');
          $archivo1->storeAs('public/'.$paquete->NombrePaquete, $archivo1->getClientOriginalName());
          $imagen=new ImagenPaqueteTuristico();
          $imagen->Imagen1=$paquete->NombrePaquete.'/'.$archivo1->getClientOriginalName();

          $archivo2=$request->file('imagen2');
          $archivo2->storeAs('public/'.$paquete->NombrePaquete, $archivo2->getClientOriginalName());
          $imagen->Imagen2=$paquete->NombrePaquete.'/'.$archivo2->getClientOriginalName();

          $archivo3=$request->file('imagen3');
          $archivo3->storeAs('public/'.$paquete->NombrePaquete, $archivo3->getClientOriginalName());
          $imagen->Imagen3=$paquete->NombrePaquete.'/'.$archivo3->getClientOriginalName();
          $imagen->id_paquete=$paquete->IdPaquete;


          $archivo4=$request->file('imagen4');
          $archivo4->storeAs('public/'.$paquete->NombrePaquete, $archivo4->getClientOriginalName());
          $imagen->Imagen4=$paquete->NombrePaquete.'/'.$archivo4->getClientOriginalName();

          $imagen->save();



          for ($i=0; $i<count($request->gastosextras);$i++){
              $gastospaquete = new GastosExtrasPaquete();
              $gastospaquete->paquete_id = $paquete->IdPaquete;
              $gastospaquete->gastosextras_id = $request->gastosextras[$i];
              $gastospaquete->save();
          }

          for ($i=0; $i<count($request->itinerario);$i++){
              $itinerariopaquete = new ItinerarioPaquete();
              $itinerariopaquete->paquete_id = $paquete->IdPaquete;
              $itinerariopaquete->itinerario_id = $request->itinerario[$i];
              $itinerariopaquete->save();
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
          $rutaturistica=RutaTuristica::all();
          $pais=Pais::all();
          $departamento=Departamento::all();
          $gastosextras=GastosExtras::all();
          $incluye=Incluye::all();
          $condiciones=Condiciones::all();
          $recomendaciones=Recomendaciones::all();
          $itinerario=Itinerario::all();
          return redirect('MostrarPaquete')->with('status', "Guardado con éxito");
    }
    public function show()
    {
      $paquetes=Paquete::orderBy('IdPaquete','desc')->paginate(6);
      $imagenes = ImagenPaqueteTuristico::all();
      return view('welcome')->with('imagenes',$imagenes)->with('paquetes',$paquetes);
    }
    public function edit($id, Request $request)
    {
      $paquete=Paquete::findOrFail($id);
      $ruta =RutaTuristica::all();
      $imagenes = ImagenPaqueteTuristico::where('id_paquete',$id)->first();
      $incluye=Incluye::all();
      $recomendaciones=Recomendaciones::all();
      $condiciones=Condiciones::all();
      $itinerario=Itinerario::all();
      $gastosextras=GastosExtras::all();
      $sql = 'SELECT "IdRecomendacionesPaquete", recomendaciones_id , paquete_id
          FROM "Recomendaciones_Paquete"
          WHERE "paquete_id" = '.$id.' ;';
          $recomendacionespaquete= DB::select($sql);

       $sql = 'SELECT "IdIncluyePaquete", incluye_id , paquete_id
          FROM "Incluye_Paquete"
          WHERE "paquete_id" = '.$id.' ;';
          $incluyepaquete= DB::select($sql);

       $sql = 'SELECT "IdCondicionesPaquete", condiciones_id , paquete_id
           FROM "Condiciones_Paquete"
           WHERE "paquete_id" = '.$id.' ;';
           $condicionespaquete= DB::select($sql);

       $sql = 'SELECT "IdItinerarioPaquete", itinerario_id , paquete_id
              FROM "Itinerario_Paquete"
              WHERE "paquete_id" = '.$id.' ;';
              $itinerariopaquete= DB::select($sql);

        $sql = 'SELECT "IdGastosExtraPaquete", gastosextras_id , paquete_id
                FROM "GastosExtras_Paquete"
                WHERE "paquete_id" = '.$id.' ;';
                $gastosextraspaquete= DB::select($sql);

      return view('adminPaquete.edit')
      ->with('paquete',$paquete)
      ->with('ruta',$ruta)
      ->with('imagen',$imagenes)
      ->with('recomendaciones', $recomendaciones)
      ->with('recomendacionespaquete',$recomendacionespaquete)
      ->with('incluye',$incluye)
      ->with('incluyepaquete',$incluyepaquete)
      ->with('condiciones', $condiciones)
      ->with('condicionespaquete',$condicionespaquete)
      ->with('itinerario', $itinerario)
      ->with('itinerariopaquete',$itinerariopaquete)
      ->with('gastosextras',$gastosextras)
      ->with('gastosextraspaquete',$gastosextraspaquete);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,array(
        'nombrepaquete'=>'required',
        'fechasalida'=>'required',
        'hora'=>'required',
        'fecharegreso'=>'required',
        'lugarsalida'=>'required|max:200',
        'precio'=>'required',
        'tipopaquete'=>'required|max:20',
        'cupos'=>'required',
        'dificultad'=>'required|max:20',
        'video'=>'required',
        'galeria'=>'required',
      ));

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
        $paquete->Video=$request->video;
        $paquete->Galeria=$request->galeria;

        $imagen = ImagenPaqueteTuristico::where('id_paquete',$id);
        $imagen2= $imagen->first();
        if( $request->hasFile('imagen1')){
          $archivo1=$request->file('imagen1');
       if($request->file('imagen1') != $imagen2->Imagen1){
         $ruta= 'public/'.$imagen2->Imagen1;
         Storage::delete($ruta);
       }
         $archivo1=$request->file('imagen1');
         $archivo1->storeAs('public/'.$paquete->NombrePaquete, $archivo1->getClientOriginalName());
         $imagen->update(array('Imagen1' => $paquete->NombrePaquete.'/'.$archivo1->getClientOriginalName()));
      }
        if( $request->hasFile('imagen2')){
          $archivo2=$request->file('imagen2');
       if($request->file('imagen2') != $imagen2->Imagen2){
         $ruta2= 'public/'.$imagen2->Imagen2;
         Storage::delete($ruta2);
       }
       $archivo2=$request->file('imagen2');
       $archivo2->storeAs('public/'.$paquete->NombrePaquete, $archivo2->getClientOriginalName());
       $imagen->update(array('Imagen2' => $paquete->NombrePaquete.'/'.$archivo2->getClientOriginalName()));
        }
        if( $request->hasFile('imagen3')){
          $archivo3=$request->file('imagen3');
       if($request->file('imagen3') != $imagen2->Imagen3){
         $ruta3= 'public/'.$imagen2->Imagen3;
         Storage::delete($ruta3);
       }
       $archivo3=$request->file('imagen3');
       $archivo3->storeAs('public/'.$paquete->NombrePaquete, $archivo3->getClientOriginalName());
       $imagen->update(array('Imagen3' => $paquete->NombrePaquete.'/'.$archivo3->getClientOriginalName()));
        }
        if( $request->hasFile('imagen4')){
          $archivo4=$request->file('imagen4');
       if($request->file('imagen4') != $imagen2->Imagen4){
         $ruta4= 'public/'.$imagen2->Imagen4;
         Storage::delete($ruta4);
       }
       $archivo4=$request->file('imagen4');
       $archivo4->storeAs('public/'.$paquete->NombrePaquete, $archivo4->getClientOriginalName());
       $imagen->update(array('Imagen4' => $paquete->NombrePaquete.'/'.$archivo4->getClientOriginalName()));
        }
        $gastospaquete1 = GastosExtrasPaquete::where('paquete_id',$id);
        $gastospaquete1->delete();

        $condicionespaquete1 = CondicionesPaquete::where('paquete_id',$id);
        $condicionespaquete1->delete();

        $recomendacionespaquete1 = RecomendacionesPaquete::where('paquete_id',$id);
        $recomendacionespaquete1->delete();

        $incluyepaquete1 = IncluyePaquete::where('paquete_id',$id);
        $incluyepaquete1->delete();

        $itinerariopaquete1 = ItinerarioPaquete::where('paquete_id',$id);
        $itinerariopaquete1->delete();

      for ($i=0; $i<count($request->gastosextras);$i++){
        $gastospaquete = new GastosExtrasPaquete();
        $gastospaquete->paquete_id = $paquete->IdPaquete;
        $gastospaquete->gastosextras_id = $request->gastosextras[$i];
        $gastospaquete->save();
      }

      for ($i=0; $i<count($request->itinerario);$i++){
        $itinerariopaquete = new ItinerarioPaquete();
        $itinerariopaquete->paquete_id = $paquete->IdPaquete;
        $itinerariopaquete->itinerario_id = $request->itinerario[$i];
        $itinerariopaquete->save();
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
        $paquete->save();
        return redirect('MostrarPaquete')->with('status', "Actualizado con éxito");
    }

    public function destroy($id)
    {
        //
    }
    public function getSingle($id)
    { //Arreglar para mostrar solo paquete q esten activos
      $paquete= Paquete::findOrfail($id);//where('IdPaquete','=',$id)->first();
      if($paquete->compara_fechas != 2 || $paquete->AprobacionPaquete == 0 || $paquete->DisponibilidadPaquete == 0){
              return abort(403);
      }
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

      $itinerario = ItinerarioPaquete::where('paquete_id',$id)->get();
      $itinerario = $itinerario->all();
      //Trae las imagenes relacionadas al paquete
      $imagenes = ImagenPaqueteTuristico::where('id_paquete',$id)->get();
      $imagenes2 = $imagenes->all();

      return view('adminPaquete.single')
      ->with('paquete',$paquete)
      ->with('condiciones',$condiciones)
      ->with('recomendaciones',$recomendaciones)
      ->with('gastosextras',$gastosextras)
      ->with('incluye',$incluye)
      ->with('itinerario',$itinerario)
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
        $transportes = Transporte::all();
        $this->conductores = '';
        //Traeme los conductores de esta empresa de transporte
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
        ->with('conductores',$this->conductores)
        ->with('paquete',$paquete)
        ->with('consulta',$consulta)
        ->with('consultaconductor',$consultaconductor);


    }
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
    public function createcopia($id, Request $requestt)
    {
      $paquete=Paquete::findOrFail($id);
      $ruta =RutaTuristica::all();
      $incluye=Incluye::all();
      $recomendaciones=Recomendaciones::all();
      $condiciones=Condiciones::all();
      $itinerario=Itinerario::all();
      $gastosextras=GastosExtras::all();


      $sql = 'SELECT "IdRecomendacionesPaquete", recomendaciones_id , paquete_id
              FROM "Recomendaciones_Paquete"
              WHERE "paquete_id" = '.$id.' ;';
      $recomendacionespaquete= DB::select($sql);

      $sql = 'SELECT "IdIncluyePaquete", incluye_id , paquete_id
              FROM "Incluye_Paquete"
             WHERE "paquete_id" = '.$id.' ;';
      $incluyepaquete= DB::select($sql);

      $sql = 'SELECT "IdCondicionesPaquete", condiciones_id , paquete_id
              FROM "Condiciones_Paquete"
              WHERE "paquete_id" = '.$id.' ;';
      $condicionespaquete= DB::select($sql);

      $sql = 'SELECT "IdItinerarioPaquete", itinerario_id , paquete_id
              FROM "Itinerario_Paquete"
              WHERE "paquete_id" = '.$id.' ;';
      $itinerariopaquete= DB::select($sql);

      $sql = 'SELECT "IdGastosExtraPaquete", gastosextras_id , paquete_id
              FROM "GastosExtras_Paquete"
              WHERE "paquete_id" = '.$id.' ;';
      $gastosextraspaquete= DB::select($sql);


      return view('adminPaquete.createcopia')
            ->with('paquete',$paquete)
            ->with('ruta',$ruta)
            ->with('recomendaciones', $recomendaciones)->with('recomendacionespaquete',$recomendacionespaquete)->with('incluye',$incluye)->with('incluyepaquete',$incluyepaquete)
            ->with('condiciones', $condiciones)->with('condicionespaquete',$condicionespaquete)
            ->with('itinerario', $itinerario)->with('itinerariopaquete',$itinerariopaquete)
            ->with('gastosextras',$gastosextras)->with('gastosextraspaquete',$gastosextraspaquete);

    }

    public function storecopia(Request $request)
    {

      $this->validate($request,array(
        'nombrepaquete'=>'required',
        'fechasalida'=>'required',
        'hora'=>'required',
        'fecharegreso'=>'required',
        'lugarsalida'=>'required|max:200',
        'precio'=>'required',
        'tipopaquete'=>'required|max:20',
        'video'=>'required',
        'galeria'=>'required',
        'cupos'=>'required',
        'dificultad'=>'required|max:20',
      ));
        $hoystr = Carbon::now()->format('d-m-Y');
        $hoyObj = Carbon::parse($hoystr);
        $fechaSalidaObj = Carbon::parse($request->fechasalida);
        $fechaRegresoObj = Carbon::parse($request->fecharegreso);
         if($fechaSalidaObj <= $hoyObj  ){
           return back()->with('ErrorFs', 'Error en fecha');
         }elseif($fechaRegresoObj <= $hoyObj){
          return redirect()->back()->withInput()->with('ErrorFr', 'Error en fecha');
         }
         elseif($fechaRegresoObj < $fechaSalidaObj){
           return redirect()->back()->withInput()->with('ErrorFeschas', 'Error en fecha');
         }

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
          $paquete->Video=$request->video;
          $paquete->Galeria=$request->galeria;
          $paquete->Dificultad=$request->dificultad;
          $paquete->AprobacionPaquete= "0";
          $paquete->DisponibilidadPaquete= "1";
          $paquete->save();

          $archivo1=$request->file('imagen1');
          $archivo1->storeAs('public/'.$paquete->NombrePaquete.$paquete->IdPaquete, $archivo1->getClientOriginalName());
          $imagen=new ImagenPaqueteTuristico();
          $imagen->Imagen1=$paquete->NombrePaquete.$paquete->IdPaquete.'/'.$archivo1->getClientOriginalName();

          $archivo2=$request->file('imagen2');
          $archivo2->storeAs('public/'.$paquete->NombrePaquete.$paquete->IdPaquete, $archivo2->getClientOriginalName());
          $imagen->Imagen2=$paquete->NombrePaquete.$paquete->IdPaquete.'/'.$archivo2->getClientOriginalName();

          $archivo3=$request->file('imagen3');
          $archivo3->storeAs('public/'.$paquete->NombrePaquete.$paquete->IdPaquete, $archivo3->getClientOriginalName());
          $imagen->Imagen3=$paquete->NombrePaquete.$paquete->IdPaquete.'/'.$archivo3->getClientOriginalName();
          $imagen->id_paquete=$paquete->IdPaquete;

          $archivo4=$request->file('imagen4');
          $archivo4->storeAs('public/'.$paquete->NombrePaquete.$paquete->IdPaquete, $archivo4->getClientOriginalName());
          $imagen->Imagen4=$paquete->NombrePaquete.'/'.$archivo4->getClientOriginalName();

          $imagen->save();

          for ($i=0; $i<count($request->gastosextras);$i++){
            $gastospaquete = new GastosExtrasPaquete();
            $gastospaquete->paquete_id = $paquete->IdPaquete;
            $gastospaquete->gastosextras_id = $request->gastosextras[$i];
            $gastospaquete->save();
          }

          for ($i=0; $i<count($request->itinerario);$i++){
            $itinerariopaquete = new ItinerarioPaquete();
            $itinerariopaquete->paquete_id = $paquete->IdPaquete;
            $itinerariopaquete->itinerario_id = $request->itinerario[$i];
            $itinerariopaquete->save();
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

        return redirect('MostrarPaquete')->with('status', "Guardado con éxito");

    }

    public function listarConductores(Request $request){

       if ($request->ajax())
        {
          if($request->id == 'idDefault'){
            $arrayDefault = array('' => '' );

            return \Response::json(array(
                    "exito" => 'Llegamos al controlador',
                     "valor" => $request->id,
                     "conductores" => $arrayDefault,
                 ));
          }else{
          $this->conductores = Conductor::where('IdEmpresaTransporte',$request->id)->get();

          return \Response::json(array(
                    "exito" => 'Llegamos al controlador',
                     "valor" => $request->id,
                     "conductores" => $this->conductores,
                 ));
          }

        }
      return \Response::json(array("error" => "response was not JSON"));
    }

    public function asignaTransCondPaquete($paquete, Request $request){

         $splitSelectTransporte = explode('-', $request->transporte);
         if(count($splitSelectTransporte) == 1){
         if($splitSelectTransporte[0] == "idDefault" || $request->conductor == "defecto" ){
          return back()->with('etransporte',"Transporte requerido")
          ->with('econductor',"Conductor requerido");
         }
         }
     try{ //dd("punto 1");
          $transporte = Transporte::findOrfail($splitSelectTransporte[2]);
          $conductor = Conductor::findOrfail($request->get('conductor'));
         // dd("punto 2");
           $sqlt = 'SELECT count(*) as cuenta
                   FROM public."Contrata" as cta
                   WHERE cta."IdTransporte" = '.$splitSelectTransporte[2].' and cta."IdPaquete" = '.$paquete.';';
           $existeTransportePaquete = DB::select($sqlt);
          //dd("punto 3");
           $sqlc = 'SELECT count(*) as cuenta
                    FROM public."Conduce" as cdc
                    WHERE cdc."IdConductor" = '.$request->conductor.' and cdc."IdPaquete" = '.$paquete.';';
           $existeconductorPaquete = DB::select($sqlc);
          // dd("punto 4");
         //  dd($existeTransportePaquete[0]->cuenta." -- ".$existeconductorPaquete[0]->cuenta );
           if($existeTransportePaquete[0]->cuenta != 0 || $existeconductorPaquete[0]->cuenta != 0){
              if($existeTransportePaquete[0]->cuenta != 0 && $existeconductorPaquete[0]->cuenta == 0){
                return back()->with('fallo', "Ya se encuentra asignado este transporte a este paquete.");
              }elseif($existeTransportePaquete[0]->cuenta == 0 && $existeconductorPaquete[0]->cuenta != 0){
               return back()->with('fallo', "Ya se encuentra asignado este conductor a este paquete.");
              }else{
               return back()->with('fallo', "Ya se encuentra asignado este conductor y este transporte a este paquete.");
              }

           }
          $transporte->paquetes()->attach($paquete);
          $conductor->paquetescon()->attach($paquete);
          //dd("punto 5");
          $paquete= Paquete::findOrfail($paquete);
          $transportes = Transporte::all();
          $this->conductores = '';//Conductor::all();
          //$paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','asc')->paginate(5);

         /* $consultaconductor= DB::table('Conduce')
            ->join('Conductor', 'Conduce.IdConductor', '=', 'Conductor.IdConductor')
            ->select('Conductor.NombreConductor')
            ->where('Conduce.IdPaquete','=',$id)
            ->get(); */

          return back()
          ->with('paquete',$paquete)
          ->with('transportes',$transportes)
          ->with('conductores',$this->conductores)
         // ->with('consultaconductor',$consultaconductor)
          ->with('status',"Asignado exitosamente");
        } catch(\Exception $e) {
          return back()->with('fallo', "Error.");
        }

    }


    public function cambiarEstado(Request $request)
    {
      //$aprobacionpaquete = Paquete::where('paquete_id',$id)->update(array('AprobacionPaquete' => $request->aprobacionpaquete));
      $paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','desc')->paginate(10);

      return view('adminPaquete.estado', compact('paquetes'));

    }

    public function cambiarEstado2(Request $request, $id)
    {
   $paquetes = Paquete::nombre($request->get('nombre'))->orderBy('IdPaquete','desc')->paginate(10);

      $paquete = Paquete::where('IdPaquete',$id)->first();

      if($paquete->AprobacionPaquete === '1'){
        DB::table('Paquetes')->where('IdPaquete', $id)->update(array('AprobacionPaquete' => '0'));
        return redirect('/ActualizarEstadoPaquete')
              ->with('status',"Actualizado con éxito")->with('paquetes',$paquetes);

      }else {
        DB::table('Paquetes')->where('IdPaquete', $id)->update(array('AprobacionPaquete' => '1'));
        return redirect('/ActualizarEstadoPaquete')
              ->with('status',"Actualizado con éxito")->with('paquetes',$paquetes);
      }
    }


    /**
    * Método para generar PDF de paquetes
    */
    public function reporte($id)
    {
      $paquete= Paquete::findOrfail($id);
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
      $itinerario = ItinerarioPaquete::where('paquete_id',$id)->get();
      $itinerario = $itinerario->all();
      //instantiate and use the dompdf class
      $view=\View::make('adminPaquete.reporte',compact('paquete','condiciones','recomendaciones','gastosextras','incluye','itinerario','imagen'))->render();
      $dompdf = new Dompdf();
      $dompdf->loadHtml($view);
      // Render the HTML as PDF
      $dompdf->render();
      $canvas = $dompdf ->get_canvas();
      $canvas->page_text(280, 760, "Página  {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
      // Output the generated PDF to Browser
      $dompdf->stream('Paquetes.pdf');
    }
}
