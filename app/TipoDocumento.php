<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipodocumento';

    protected $primaryKey = 'IdTipoDocumento';

    protected $fillable = [
        'IdTurista','TipoDocumento','NumeroDocumento', 'FechaVenceDocumento',
    ];

    public $timestamps = false;

   public function turist()
  {
      //return $this->belongsTo('App\Turista','IdTurista');//Modelo y llave foránea
       //return $this->belongsTo(TipoTransporte::class);
       return $this->belongsTo('App\Turista');
  }

}
