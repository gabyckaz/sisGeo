<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'name', 'IdPersona', 'email', 'password','RecibirNotificacion','EstadoUsuario', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function persona()
    {
         return $this->hasOne('App\Persona', 'IdPersona', 'IdPersona');
         //return $this->hasOne('App\Persona');
    }

    public function scopeInicial($query, $v){
        
      
     }

     public function scopeNombre($query, $nombre){
        
      if(trim($nombre) != ""){       
         
      $query->where('name', "Like", "%$nombre%");
       }
     }

     public function scopeEmail($query, $email){
        
      if(trim($email) != ""){       
         
      $query->where('email', "Like", "%$email%");
       }
     }

     public function scopeEstado($query, $estado){
       
      if(trim($estado) != ""){       
         
      $query->where('EstadoUsuario', "$estado");
       }
     }

     public function scopeRol($query, $rol){
    //   dd($rol);
      if(trim($rol) != ""){       
         
        return $query->whereHas('roles', function($q) use ($rol) {
            $q->where('id', $rol);
            } );
         
       }
     }


}
