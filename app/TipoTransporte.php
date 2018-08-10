<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TipoTransporte extends Model
{
  use Sortable;
  //aqui se especifica el nombre de la tabla relacionada al modelo
  protected $table = 'TipoTransporte';

  //Para que no se greguen los atributos automaticos de updated_at y created_at
  public $timestamps = false;

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdTipoTransporte';

  public $sortable = ['NombreTipoTransporte'];
/*
  public function transportes()
{
  //  return $this->hasOne('App\Transporte','IdTipoTransporte','IdTipoTransporte');
    //return $this->hasOne(Transporte::class);
}
*/
}
