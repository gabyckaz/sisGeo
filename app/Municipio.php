<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'municipio';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdMunicipio';
}
