<?php

use Illuminate\Database\Seeder;
use App\Condiciones as Condiciones;
class CondicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Condiciones::create([
        'idcondiciones'=>1,
        'nombrecondiciones'=>'Se requiere anticipo NO reembolsable por persona para garantizar la reservación.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Condiciones::create([
        'idcondiciones'=>2,
        'nombrecondiciones'=>'Geoturismo NO se hace responsable por atrasos, huelgas, cierre de calles o fronteras, temblores, huracanes ó alguna otra situación inesperada.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Condiciones::create([
        'idcondiciones'=>3,
        'nombrecondiciones'=>'Si nos vemos obligados a cancelar una actividad por algún imprevisto, seremos responsables de reintegrar lo abonado a su totalidad.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Condiciones::create([
        'idcondiciones'=>4,
        'nombrecondiciones'=>'Nuestra empresa NO se hace responsable por problemas legales en la frontera con alguno de los turistas asistentes en caso de ser así, NO se hará ningún tipo de devolución.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Condiciones::create([
        'idcondiciones'=>5,
        'nombrecondiciones'=>' Si el turista no se presenta el día y hora indicada de la actividad NO habrá devolución alguna.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
