<?php
//Controlador para tipos de transporte y conductores
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoTransporte;
use App\Conductor;
use App\EmpresaAlquilerTransporte;
use DB;

class TipoTransporteController extends Controller
{

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
      $tipotransporte = TipoTransporte::orderBy('NombreTipoTransporte','asc')->get();
      return view('adminTipoTransporte.index', compact('tipotransporte'));
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
      dd($request);
      try{
        //validando la informacion, campo obliatorio, caracteres de max.25 digitos y campo único sin repeticiones
        $this->validate($request,array(
       'tipotransporte' => 'required|string|unique:TipoTransporte,NombreTipoTransporte|max:25',

        ));

       //Guardar en la BD

       //Relacionando campo de BD con formulario
       //campo de BD -> campo del formulario
       $tipotransporte=new TipoTransporte;
       $tipotransporte->NombreTipoTransporte=$request->tipotransporte;

       $tipotransporte->save();
          return redirect('adminTipoTransporte')->with('status', "Agregado con éxito");

    }  catch(\Exception $e) {
         return redirect('adminTipoTransporte')->with('fallo', "Error al guardar.");
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
}
