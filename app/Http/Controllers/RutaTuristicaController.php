<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\RutaTuristica;
use App\Categoria;

class RutaTuristicaController extends Controller
{
    //Solo con acceso los que hayan iniciado sesion
    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rutaturistica = RutaTuristica::all();
      $paises = Pais::all();
      $categoria = Categoria::all();
      return view('adminRutaTuristica.index',compact('rutaturistica','paises','categoria'));
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
            'categoria'=>'required',
            'nombrerutaturistica'=>'required|max:60|unique:RutaTuristica,NombreRutaTuristica',
            'datosgenerales'=>'required|max:1024',
            'descripcionrutaturistica'=>'required|max:1024',
        ));
        $rutaturistica=new RutaTuristica;
        $rutaturistica->IdPais=$request->pais;
        $rutaturistica->IdCategoria=$request->categoria;
        $rutaturistica->NombreRutaTuristica=$request->nombrerutaturistica;
        $rutaturistica->DatosGenerales=$request->datosgenerales;
        $rutaturistica->DescripcionRutaTuristica=$request->descripcionrutaturistica;
        $rutaturistica->save();
            return redirect('/MostrarRutaTuristica')->with('status',"Guardado con exito.")->withInput();




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
      $rutaturistica = RutaTuristica::find($id);
      $paises = Pais::all();
      $categoria=Categoria::all();
      return view('adminRutaTuristica.edit', compact('categoria','rutaturistica','paises'));
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
        'pais'=>'required',
        'categoria'=>'required',
        'nombrerutaturistica'=>'required|max:60',
        'datosgenerales'=>'required|max:1024',
        'descripcionrutaturistica'=>'required|max:1024',
         ));

      $rutaturistica=RutaTuristica::find($id);
      $rutaturistica->IdPais=$request->pais;
      $rutaturistica=Categoria::find($id);
      $rutaturistica->IdCategoria=$request->categoria;
      $rutaturistica->NombreRutaTuristica=$request->nombrerutaturistica;
      $rutaturistica->DatosGenerales=$request->datosgenerales;
      $rutaturistica->DescripcionRutaTuristica=$request->descripcionrutaturistica;
      $rutaturistica->save();

      return redirect('/MostrarRutaTuristica')->with('status',"Guardado con exito");
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
