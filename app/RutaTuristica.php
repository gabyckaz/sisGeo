<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutaTuristica extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'RutaTuristica';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdRutaTuristica';

    //Relacion con Pais
    public function pais()
    {
        return $this->belongsTo('App\Pais','IdPais');//Modelo y llave foránea
    }

    //Relación de categorías con Ruta Turística
    public function categoria()
    {
      return $this->belongsTo('App\Categoria','IdCategoria');//Modelo y llave foránea
    }

}
