<?php

use Illuminate\Database\Seeder;
use App\Conductor as Conductor;
class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Conductor::create([
        'IdConductor'=>1,
        'IdEmpresaTransporte'=>1,
        'NombreConductor'=>'Alam Mendez'
      ]);
      Conductor::create([
        'IdConductor'=>2,
        'IdEmpresaTransporte'=>1,
        'NombreConductor'=>'Edwin Ramos'
      ]);
      Conductor::create([
        'IdConductor'=>3,
        'IdEmpresaTransporte'=>1,
        'NombreConductor'=>'Camila Rojas'
      ]);
      Conductor::create([
        'IdConductor'=>4,
        'IdEmpresaTransporte'=>2,
        'NombreConductor'=>'Luis Rivas'
      ]);
      Conductor::create([
        'IdConductor'=>5,
        'IdEmpresaTransporte'=>3,
        'NombreConductor'=>'Oscar Hidalgo'
      ]);
    }
}
