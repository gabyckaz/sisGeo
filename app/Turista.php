<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turista extends Model
{
    //aqui se especifica el nombre de la tabla relacionada al modelo
  protected $table = 'turista';

 protected $fillable = [
        'IdNacionalidad', 'IdPersona', "FechaNacimiento", "TipoDocumento", "Dui_Pasaporte", "FechaVenceDocumen", "DomicilioTurista", "Problemas_Salud", 'CategoriaTurista',
    ];


  //Para que no se greguen los atributos automaticos de updated_at y created_at
  //public $timestamps = false;

  //Cambiando el campo por defecto id a uno personalizado
  protected $primaryKey = 'IdTurista';

   public function persona()
  {
      return $this->belongsTo('App\Persona','IdPersona');//Modelo y llave foránea
       //return $this->belongsTo(TipoTransporte::class);
  }

  public function documentos()
    {
        // Si el id tienen diferentes nombres
        return $this->hasMany('App\TipoDocumento', 'IdTurista', 'IdTurista');
    }

    public function usuarios(){
      return $this->belongsToMany('App\User', 'acompanante')
     ->withPivot('IdUsuario','EsFamiliar');
 }

}
