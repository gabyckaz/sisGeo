<?php

use Illuminate\Database\Seeder;
use App\GastosExtras as Gastos;

class GastosExtrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Gastos::create([
        'idgastosextras'=>1,
        'nombregastos'=>'Costo de entrada con Carnet de estudiante',
        'gastos'=> 0.50,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Gastos::create([
        'idgastosextras'=>2,
        'nombregastos'=>'Costo de entrada General',
        'gastos'=> 3,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Gastos::create([
        'idgastosextras'=>3,
        'nombregastos'=>'Costo de entrada Extranjero',
        'gastos'=> 5,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Gastos::create([
        'idgastosextras'=>4,
        'nombregastos'=>'Transporte adicional',
        'gastos'=> 3,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Gastos::create([
        'idgastosextras'=>5,
        'nombregastos'=>'Entrada al parque de aves opcional',
        'gastos'=> 10,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Gastos::create([
        'idgastosextras'=>6,
        'nombregastos'=>'Extranjeros no centroamericano sumar adicional',
        'gastos'=> 9,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Gastos::create([
        'idgastosextras'=>7,
        'nombregastos'=>'*Habitaciones Dobles o Triples sin Costo Adicional. Habitaciones sencilla  de una sola persona Sumar ',
        'gastos'=> 45,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
