<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transporte extends Model
{
  use Sortable;

  //aqui se especifica el nombre de la tabla relacionada al modelo
  protected $table = 'Transporte';

  //Para que no se greguen los atributos automaticos de updated_at y created_at
  public $timestamps = false;

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdTransporte';

  //Definicion los campos del ordenamiento en la tabla index
  public $sortable = ['NombreEmpresaTransporte','NombreTipoTransporte','NumeroAsientos'];

  public function empresaalquilertransporte()
  {
      return $this->belongsTo('App\EmpresaAlquilerTransporte', 'IdEmpresaTransporte');
  }

  public function tipotransporte()
  {
      return $this->belongsTo('App\TipoTransporte','IdTipoTransporte');//Modelo y llave foránea
       //return $this->belongsTo(TipoTransporte::class);
  }

   public function paquetes()
   {
       return $this->belongsToMany('App\Paquete', 'Contrata', 'IdTransporte', 'IdPaquete');
   }

}
