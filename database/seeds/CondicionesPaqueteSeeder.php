<?php

use Illuminate\Database\Seeder;
use App\CondicionesPaquete as CondicionesPaquete;

class CondicionesPaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      CondicionesPaquete::create([
        'idcondicionespaquete'=>1,
        'condiciones_id'=>1,
        'paquete_id'=>2
      ]);
      CondicionesPaquete::create([
        'idcondicionespaquete'=>2,
        'condiciones_id'=>2,
        'paquete_id'=>2
      ]);
      CondicionesPaquete::create([
        'idcondicionespaquete'=>3,
        'condiciones_id'=>3,
        'paquete_id'=>2
      ]);
      CondicionesPaquete::create([
        'idcondicionespaquete'=>4,
        'condiciones_id'=>4,
        'paquete_id'=>2
      ]);
      CondicionesPaquete::create([
        'idcondicionespaquete'=>5,
        'condiciones_id'=>5,
        'paquete_id'=>2
      ]);
    }

}
