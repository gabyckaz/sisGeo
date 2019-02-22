<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Validation\Factory as Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected $fechaNaciomiento;
    protected $dui;
    protected $pasaporte;


    public function boot()
    {
        //Que la fecha de nacimiento no sea mayor a la fecha de hoy
        $this->app->validator->extendImplicit('fnic', function ($attribute, $value, $parameters) {
            $this->fechaNaciomiento = $value;
            return $this->validaEdadMayorHoy($value);
        }, 'Fecha incorrecta');
        //Que no sea menor de edad
        $this->app->validator->extendImplicit('vmedad', function ($attribute, $value, $parameters) {
            return $this->validaMayorEdad($this->fechaNaciomiento);
        }, 'Debes ser mayor de edad');
        //Que el Numero de dui sea correcto
        $this->app->validator->extendImplicit('dui', function ($attribute, $value, $parameters) {

            if($value != "" && $value != null){
                
            return $this->validaDui($value);
            }else{
                return true;
            }   
        
        }, 'Numero de DUI incorrecto');
        //Que fecha de vencimiento de dui y pasaporte sehan correctas
        $this->app->validator->extendImplicit('fvdp', function ($attribute, $value, $parameters) {
            return $this->validaFechaDUI_P($value);
        }, 'Fecha vencimiento incorrecta');

        $this->app->validator->extendImplicit('no_html', function ($attribute, $value, $parameters) {
            dd($parameters);
            return false;
        }, 'You can\'t use html here !');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

/**
*Mis Propias Validaciones
*
*/
public function validaEdadMayorHoy($fecha){
       $hoystr = Carbon::now()->format('d-m-Y');
       $hoyObj = Carbon::parse($hoystr);
       $fechaIngresada = Carbon::parse($fecha);
       $fechaIngresadaStr = $fechaIngresada->format('d-m-Y');
       $fechaIngresadaObj = Carbon::parse($fechaIngresadaStr);

      if( $fechaIngresadaObj >= $hoyObj ){
        return false;
      }
      return true;
    }

public function validaMayorEdad($fecha){
    $edad = Carbon::parse($fecha)->age;

    if($edad < 18){
      return false;
    }
    return true;
}

 public function validaDui($dui){
      $separador ='-';
      $partesDui = explode('-', $dui);
      $numeroDui = $partesDui[0];
      $digitoVerificador = $partesDui[1];
      $arrayNumeroDui = str_split($numeroDui);
      $suma = (9*$arrayNumeroDui[0])+(8*$arrayNumeroDui[1])+(7*$arrayNumeroDui[2])+(6*$arrayNumeroDui[3])+(5*$arrayNumeroDui[4])+(4*$arrayNumeroDui[5])+(3*$arrayNumeroDui[6])+(2*$arrayNumeroDui[7]);
      $moduloDiv = $suma%10;
      $resta = 10-$moduloDiv;

      $resta = $resta."";
      $digitoVerificador = $digitoVerificador."";
      $moduloDiv = $moduloDiv."";
    
      if($resta === "0" || $resta === $digitoVerificador || $moduloDiv === "0"){
        
        return true;
      }
      return false;
 }

public function validaFechaDUI_P($fecha){
   
    $hoystr = Carbon::now()->format('d-m-Y');
    $hoyObj = Carbon::parse($hoystr);

    $fechaVencimientoIngresada = Carbon::parse($fecha);
    if($fechaVencimientoIngresada <= $hoyObj ){
        return false;
        }
    return true;
}

}
