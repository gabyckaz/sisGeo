<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
  //aqui se especifica el nombre de la tabla relacionada al modelo
  protected $table = 'Transporte';

  //Para que no se greguen los atributos automaticos de updated_at y created_at
  public $timestamps = false;

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdTransporte';

  public function EmpresaAlquilerTransportes()
  {
      return $this->belongsTo('App\EmpresaAlquilerTransporte');
  }

  public function tipotransporte()
  {
      return $this->belongsTo('App\TipoTransporte','IdTipoTransporte');
       //return $this->belongsTo(TipoTransporte::class);
  }

  public function Conductores()
  {
      return $this->belongsToMany('App\Conductor');
  }



}
