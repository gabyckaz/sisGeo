<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;
use App\TipoTransporte;
use App\EmpresaAlquilerTransporte;
use DB;

class TransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $transportes = Transporte::all();
      $tipotransportes= TipoTransporte::all();
      $empresalquiler = EmpresaAlquilerTransporte::all();
      return view('adminTransporte.index', compact('transportes','tipotransportes','empresalquiler'));
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
        'tipotransporte' => 'required',
        'empresalquiler' => 'required',
        'marca'=>'required|max:25',
        'modelo'=>'required|max:30',
        'color'=>'required|max:25',
        'placa'=>'required|min:4| max:7 |unique:transporte,Placa_Matricula',
        'numeroasientos'=>'required|max:2',
        'ac'=>'size:2',
        'tv'=>'size:2',
        'wifi'=>'size:2',
        'asientos'=>'size:2',
        'observacionestransporte'=>'max:250',
      ));
      //Guardar en la BD
      //Relacionando campo de BD con formulario
      //campo de BD -> campo del formulario
      $transporte=new Transporte;
      $transporte->IdTipoTransporte=$request->tipotransporte;
      $transporte->IdEmpresaTransporte=$request->empresalquiler;
      $transporte->Marca=$request->marca;
      $transporte->Modelo=$request->modelo;
      $transporte->Color=$request->color;
      $transporte->Placa_Matricula=$request->placa;
      $transporte->NumeroAsientos=$request->numeroasientos;
      $transporte->TieneAC=$request->ac;
      $transporte->TieneTV=$request->tv;
      $transporte->TieneWifi=$request->wifi;
      $transporte->TieneAsientos=$request->asientos;
      $transporte->ObservacionesTransporte=$request->observacionestransporte;
      $transporte->save();
      return redirect('adminTransporte')->with('status', "Guardado con éxito")->withInput();
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
    public function edit($IdTransporte)
    {
      $transporte = Transporte::find($IdTransporte);
      $tipotransportes= TipoTransporte::all();
      $empresalquiler = EmpresaAlquilerTransporte::all();
      return view('adminTransporte.edit', compact('transporte','$IdTransporte','tipotransportes','empresalquiler'));
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
      $this->validate($request,array(
        'tipotransporte' => 'required',
        'empresalquiler' => 'required',
        'marca'=>'required|max:25',
        'modelo'=>'required|max:30',
        'color'=>'required|max:25',
        'placa'=>'required|min:6||max:7',
        'numeroasientos'=>'required|max:2',
        'ac'=>'size:2',
        'tv'=>'size:2',
        'wifi'=>'size:2',
        'asientos'=>'size:2',
        'observacionestransporte'=>'max:250',
      ));
      //guardar en la bd
      $transporte = Transporte::find($id);
      $transporte->IdTipoTransporte=$request->input('tipotransporte');
      $transporte->IdEmpresaTransporte=$request->input('empresalquiler');
      $transporte->Marca=$request->input('marca');
      $transporte->Modelo=$request->input('modelo');
      $transporte->Color=$request->input('color');
      $transporte->Placa_Matricula=$request->input('placa');
      $transporte->NumeroAsientos=$request->input('numeroasientos');
      $transporte->TieneAC=$request->input('ac');
      $transporte->TieneTV=$request->input('tv');
      $transporte->TieneWifi=$request->input('wifi');
      $transporte->TieneAsientos=$request->input('asientos');
      $transporte->ObservacionesTransporte=$request->input('observacionestransporte');
      $transporte->save();
      return redirect('adminTransporte')->with('status', "Gardado con éxito");
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
