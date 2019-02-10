<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncluyePaquete extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'incluye_paquete';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = false;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdIncluyePaquete';

    public function incluyepaq()
    {
      return $this->belongsTo('App\Incluye','incluye_id');//Modelo y llave foránea
    }
}
