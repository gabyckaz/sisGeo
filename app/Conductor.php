<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
  //aqui se especifica el nombre de la tabla relacionada al modelo
  protected $table = 'conductor';

  //Para que no se greguen los atributos automaticos de updated_at y created_at
  public $timestamps = false;

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdConductor';

  //Relación con tabla EmpresaAlquilerTransporte
  public function empresa()
  {
      return $this->belongsTo('App\EmpresaAlquilerTransporte','IdEmpresaTransporte');//Modelo y llave foránea
  }

  //relacion muchos a muchos con paquetes
  public function paquetescon()
  {
      return $this->belongsToMany('App\Paquete', 'conduce', 'IdConductor', 'IdPaquete');
  }
}
