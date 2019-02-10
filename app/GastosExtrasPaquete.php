<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GastosExtrasPaquete extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'gastosextras_paquete';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = false;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdGastosExtraPaquete';

    public function gastospaq()
    {
      return $this->belongsTo('App\GastosExtras','gastosextras_id');//Modelo y llave foránea
    }
}
