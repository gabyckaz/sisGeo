<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'Pago';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
   // public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdPago';
}
