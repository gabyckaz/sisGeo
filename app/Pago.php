<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  //el nombre de la tabla relacionada al modelo
  protected $table = 'PagoEnLinea';

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdPago';
}
