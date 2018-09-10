<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
  protected $table = 'Acompanante';

  //Para que no se greguen los atributos automaticos de updated_at y created_at
  public $timestamps = false;

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdFamiliarAmigo';

   protected $fillable = [        
        'IdTurista','IdUsuario','EsFamiliar',
    ];


     public function turist()
  {
      //return $this->belongsTo('App\Turista','IdTurista');//Modelo y llave foránea
       //return $this->belongsTo(TipoTransporte::class);
       return $this->belongsTo('App\Turista');
  }

}
