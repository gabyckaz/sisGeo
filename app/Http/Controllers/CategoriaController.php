<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categoria = Categoria::all();
    //Para el rdenamiento en la tabla index

        return view('adminCategoria.create',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
          return view('adminCategoria.create',compact('categoria'));
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

          'categoria'=>'required|string|unique:categoria,NombreCategoria',
        ));

       //Guardar en la BD
       //Relacionando campo de BD con formulario
       //campo de BD -> campo del formulario
       $categoria=new Categoria;
       $categoria->NombreCategoria = $request->categoria;
       $categoria->save();
       return back()->with('status',"Agregado con éxito");
          } catch(\Exception $e){
       return back()->with('fallo',"Error ya existe Categoria");
     }
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
    public function eliminarcategoria($id){

      try {
        $categoria=Categoria::where('IdCategoria',$id)->get()->first();
        if ($categoria!=null) {
          $categoria->delete();
          return back()->with('status',"Eliminado con éxito");
        }else {
          return back()->with('fallo',"Error Categoria es parte de una ruta no se puede eliminar");
        }

      } catch (\Exception $e) {
          return back()->with('fallo',"Error. Categoria es parte de una ruta no se puede eliminar");
      }


    }
}
