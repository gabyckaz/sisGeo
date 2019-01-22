<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paga extends Model
{
    //Especificación del nombre de la tabla
    protected $table = 'Paga';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = false;
}
