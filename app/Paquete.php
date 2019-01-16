<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

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

    public function scopeNombre($query, $nombre)
    {
      if(trim($nombre) != " "){
        $query->where('NombrePaquete', "Like", "%$nombre%");
      }
    }

    //relación con RutaTuristica
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
      return $this->belongsToMany('App\Conductor', 'Conduce', 'IdPaquete', 'IdConductor');
    }
    /*
     1. Si hoy es mayor que fecha de salida return 1.
     2. Si hoy es menor que fecha de salida return 2.
     3. si hoy es igual que fecha de salida return 3.
    */
    public function getComparaFechasAttribute(){
       $hoystr = Carbon::now()->format('d-m-Y');
       $hoyObj = Carbon::parse($hoystr);
       $fechaIngresadaObj = Carbon::parse($this->FechaSalida);

      if($hoyObj > $fechaIngresadaObj){
        return 1;
      }elseif($hoyObj <= $fechaIngresadaObj){
        return 2;
      }elseif($hoyObj == $fechaIngresadaObj){
        return 3;
      }
    }

    /*Ejemplo de accessors*/
    public function getFullNameAttribute()
    {
       return $this->NombrePaquete . ' ' . strtoupper($this->NombrePaquete);
    }

    public function getDiasAttribute()
    {
      $hoystr = Carbon::now()->format('d-m-Y');
      $hoyObj = Carbon::parse($hoystr);
      $fechaSalida = Carbon::parse($this->FechaSalida);

      $diferencia= $hoyObj->diffInDays($fechaSalida);
      return $diferencia;
    }

    public function guias()
    {
        return $this->belongsToMany('App\Empleado');
    }

}
