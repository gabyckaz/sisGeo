<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{

    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'reservacion';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = false;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdReservacion';

    //Relación con Turista
    public function turista()
    {
      return $this->belongsTo('App\Turista','IdTurista');//Modelo y llave foránea
    }

    public function paquete()
    {
      return $this->belongsTo('App\Paquete','IdPaquete');//Modelo y llave foránea
    }
}
