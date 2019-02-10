<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecomendacionesPaquete extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'recomendaciones_paquete';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = false;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdRecomendacionesPaquete';

    public function recomendacionespaq()
    {
      return $this->belongsTo('App\Recomendaciones','recomendaciones_id');//Modelo y llave foránea
    }
}
