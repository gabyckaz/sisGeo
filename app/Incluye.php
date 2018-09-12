<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incluye extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'Incluye';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdIncluye';
}
