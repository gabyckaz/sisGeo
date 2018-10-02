<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [        
        'PrimerNombrePersona','SegundoNombrePersona','PrimerApellidoPersona','SegundoApellidoPersona','Genero', 'AreaTelContacto', 'TelefonoContacto',
    ];

    protected $primaryKey = 'IdPersona';

    public function getFullNameAttribute()
{
   return ucfirst(strtolower($this->PrimerNombrePersona)) . ' ' .ucfirst(strtolower($this->PrimerApellidoPersona));
}
}
