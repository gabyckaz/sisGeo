<?php

use Illuminate\Database\Seeder;
use App\IncluyePaquete as IncluyePaquete;

class IncluyePaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      IncluyePaquete::create([
        'idincluyepaquete'=>1,
        'incluye_id'=>1,
        'paquete_id'=>1
      ]);
      IncluyePaquete::create([
        'idincluyepaquete'=>2,
        'incluye_id'=>12,
        'paquete_id'=>1
      ]);
      IncluyePaquete::create([
        'idincluyepaquete'=>3,
        'incluye_id'=>13,
        'paquete_id'=>1
      ]);
      IncluyePaquete::create([
        'idincluyepaquete'=>4,
        'incluye_id'=>14,
        'paquete_id'=>1
      ]);
      IncluyePaquete::create([
        'idincluyepaquete'=>5,
        'incluye_id'=>15,
        'paquete_id'=>1
      ]);
    }
}
