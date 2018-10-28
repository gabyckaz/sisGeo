<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaAlquilerTransporte extends Model
{

    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'EmpresaAlquilerTransporte';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = false;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdEmpresaTransporte';

}
