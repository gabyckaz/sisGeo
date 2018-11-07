<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresaAlquilerTransporte;
use DB;
use App\Conductor;
use Session;
use Dompdf\Dompdf;
use PDF;


class EmpresaAlquilerTransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresalquiler = EmpresaAlquilerTransporte::all();
      return view('adminEmpresaTransporte.index',compact('empresalquiler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validando la informacion
      $this->validate($request,array(
        'nombreEmpresa' => 'required|max:80',
        'nombreContacto' => 'required|max:40',
        'codigoArea' => 'required',
        'numeroTelefono'=>'required|size:8',
        'emailEmpresa'=>'required|max:30',
        'observacionesEmpresa'=>'max:255',
      ));
      //Guardar en la BD
      //Relacionando campo de BD con formulario
      //campo de BD -> campo del formulario
      $empresalquiler=new EmpresaAlquilerTransporte;
      $empresalquiler->NombreEmpresaTransporte=$request->nombreEmpresa;
      $empresalquiler->NombreContacto=$request->nombreContacto;
      $empresalquiler->NumeroTelefonoContacto=$request->codigoArea.''.$request->numeroTelefono;
      $empresalquiler->EmailEmpresaTransporte=$request->emailEmpresa;
      $empresalquiler->ObservacionesEmpresaTransporte=$request->observacionesEmpresa;
      $empresalquiler->save();
      return redirect('adminEmpresaTransporte')->with('status', "Guardado con éxito");
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
    public function edit($IdEmpresaAlquilerTransporte)
    {
      $empresalquiler = EmpresaAlquilerTransporte::find($IdEmpresaAlquilerTransporte);
      $conductores = DB::table('Conductor')
                    ->where('IdEmpresaTransporte', '=', $IdEmpresaAlquilerTransporte)
                    ->get();
      return view('adminEmpresaTransporte.edit',compact('empresalquiler','IdEmpresaAlquilerTransporte','conductores'));
    }

    /**
     * Guarda un nuevo empleado de la empresa
     *
     * @param   $empresa
     */
    public function guardarConductor(EmpresaAlquilerTransporte $empresalquiler, Request $request)
    {
      //validando la informacion, campo obliatorio, caracteres de max.25 digitos y campo único sin repeticiones
      $this->validate($request,array(
        'conductor' => 'required|string|unique:Conductor,NombreConductor|max:30',
      ));
      //Guardar en la BD
      //Relacionando campo de BD con formulario
      //campo de BD -> campo del formulario
      $conductor=new Conductor;
      $conductor->NombreConductor=$request->conductor;
      $conductor->IdEmpresaTransporte=$empresalquiler->IdEmpresaTransporte;
      $conductor->save();
      return back();
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
      //validando la informacion
      $this->validate($request,array(
        'nombreempresa' => 'required|max:80',
        'nombrecontacto' => 'required|max:40',
        'numerotelefono'=>'required|size:8',
        'emailempresa'=>'required|max:30',
        'observacionesempresa'=>'max:255',
      ));
      //guardar en la bd
      $empresalquiler = EmpresaAlquilerTransporte::find($id);
      $empresalquiler->NombreEmpresaTransporte=$request->input('nombreempresa');
      $empresalquiler->NombreContacto=$request->input('nombrecontacto');
      $empresalquiler->NumeroTelefonoContacto=$request->input('numerotelefono');
      $empresalquiler->EmailEmpresaTransporte=$request->input('emailempresa');
      $empresalquiler->ObservacionesEmpresaTransporte=$request->input('observacionesempresa');
      $empresalquiler->save();
      return redirect('adminEmpresaTransporte')->with('status', "Cambios guardados con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresalquiler= EmpresaAlquilerTransporte::find($id);
      $empresalquiler->delete();
      return redirect()->route('adminEmpresaTransporte')->with('status', "Eliminado con éxito");
    }

    /**
    * Método para generar PDF de empresa
    */
    public function reporte()
    {
      $empresalquiler = EmpresaAlquilerTransporte::all();
      //instantiate and use the dompdf class
      $view=\View::make('adminEmpresaTransporte.reporte',compact('empresalquiler'))->render();
      $dompdf = new Dompdf();
      $dompdf->loadHtml($view);
      // Render the HTML as PDF
      $dompdf->render();
      $canvas = $dompdf ->get_canvas();
      $canvas->page_text(280, 730, "Página  {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
      // Output the generated PDF to Browser
      $dompdf->stream('Empresas.pdf');
    }

}
