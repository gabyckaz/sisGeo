<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class RutaTuristicaController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
            'pais'=>'required',
            'nombrerutaturistica'=>'required|max:60',
            'datosgenerales'=>'required|max:1024',
            'descripcionrutaturistica'=>'required|max:1024',
        ));
        $rutaturistica=new RutaTuristica;
        $rutaturistica->IdPais=$request->pais;
        $rutaturistica->NombreRutaTuristica=$request->nombrerutaturistica;
        $rutaturistica->DatosGenerales=$request->datosgenerales;
        $rutaturistica->DescripcionRutaTuristica=$request->descripcionrutaturistica;
        $rutaturistica->save();
            return redirect('adminRutaTuristica')->with('status',"Guardado con exito.")->withInput();




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
