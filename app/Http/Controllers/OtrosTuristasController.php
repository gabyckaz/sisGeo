<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Pago;
use App\OtroTurista;
use App\Reservacion;
use Carbon\Carbon;

class OtrosTuristasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes = Paquete::all();
        return view('adminOtrosTuristas.index', compact('paquetes'));
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
         /* $pago = new Pago;
          $pago->PagoTotal='15';
          $pago->FechaPago=Carbon::now();
          $pago->save();
          dd($pago);*/
        $this->validate($request, [
            "Nombre" => "required|alpha|min:2|max:25",
            "Apellido" => "required|alpha|min:2|max:25",
            "Telefono" => "required",
            "Paquete" => "required", 
            "MetodoPago" => "required",
            "Costo" => "required",        
          ]);  

        $totalAcomp = count($request->field_name);
        $randomString = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $conta = 0;
        
        for ($i = 0; $i < 10; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       // dd($totalAcomp);
        if($totalAcomp > 0 && $request->field_name[0] != null){
        for ($i=0; $i < $totalAcomp; $i++) { 
           // dd($request->field_name[$i]);

           $arre = explode( ',', $request->field_name[$i] );
           if($this->valid_patron($request->field_name[$i])){
            //dd('correcto');
            $conta++;
           // return redirect()->back()->withInput()->with('fallo', '1. Es necesario respetar el patron para acompañantes!');
           }else{
            return redirect()->back()->withInput()->with('fallo', '2. Es necesario respetar el patron para acompañantes!');
           }
          // dd($arre[0]." - ".$arre[1]." - ".$arre[2]);
           
        }
        //meterlos en la bd
        }
        if($totalAcomp > 0 && $request->field_name[0] == null){
        //dd('Solo el el principal');

        }
     }

     public function valid_patron($val)
        {
         if(!preg_match("/^[a-zA-Z0-9_\-\.~]{2,}\,[0-9]{0,}\,[0-9]{0,}$/", $val))
         {
         return false; //incorrecto
         }
         return true;//correcto
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
