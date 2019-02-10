<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdEmpleadoGEO';
}
