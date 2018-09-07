<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'Paquetes';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdPaquete';

    public function gastosextras()
        {
            return $this->belongsToMany('App\GastosExtras');
        }
  public function scopeNombre($query, $nombre){

         if(trim($nombre) != ""){

         $query->where('NombrePaquete', "Like", "%$nombre%");
          }
        }

}
