<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Paquete extends Model
{
    use Sortable;
    //aqui se especifica el nombre de la tabla relacionada al modelo
    protected $table = 'Paquetes';

    //Para que no se greguen los atributos automaticos de updated_at y created_at
    public $timestamps = true;

    //Cambiando el campo por defecto id a uno personalizado
    protected $primaryKey = 'IdPaquete';

    //Definicion los campos del ordenamiento en la tabla index
    public $sortable = ['IdPaquete','NombrePaquete','FechaSalida','HoraSalida','FechaRegreso','Precio'];

    public function gastosextras()
        {
            return $this->belongsToMany('App\GastosExtras');
        }
  public function scopeNombre($query, $nombre){

         if(trim($nombre) != " "){

         $query->where('NombrePaquete', "Like", "%$nombre%");
          }
        }
    public function ruta()
    {
      return $this->belongsTo('App\RutaTuristica','IdTuristica');//Modelo y llave foránea
    }

    //relacion muchos a muchos con Transporte
    public function transportes()
    {
          return $this->belongsToMany('App\Transporte', 'Contrata', 'IdPaquete', 'IdTransporte');
    }
    
    //relacion muchos a muchos con Conductor
    public function conductores()
    {
          return $this->belongsToMany('App\Conductor', 'Conduce', 'IdPaquete', 'Id Conductor');
    }

}
