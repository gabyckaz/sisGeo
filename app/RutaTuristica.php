<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class RutaTuristica extends Model
{
    use Sortable;

    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'RutaTuristica';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdRutaTuristica';

  //  public $sortable = ['NombreEmpresaTransporte','NombreTipoTransporte','NumeroAsientos'];

    public function pais()
    {
        return $this->belongsTo('App\Pais','IdPais');//Modelo y llave foránea
    }
}
