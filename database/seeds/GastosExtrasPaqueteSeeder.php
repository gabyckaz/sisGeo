<?php

use Illuminate\Database\Seeder;
use App\GastosExtrasPaquete as GastosPaquete;
class GastosExtrasPaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      GastosPaquete::create([
        'idgastosextrapaquete'=>1,
        'gastosextras_id'=>1,
        'paquete_id'=>1
      ]);
      GastosPaquete::create([
        'idgastosextrapaquete'=>2,
        'gastosextras_id'=>2,
        'paquete_id'=>1
      ]);
      GastosPaquete::create([
        'idgastosextrapaquete'=>3,
        'gastosextras_id'=>3,
        'paquete_id'=>1
      ]);
      GastosPaquete::create([
        'idgastosextrapaquete'=>4,
        'gastosextras_id'=>5,
        'paquete_id'=>4
      ]);
      GastosPaquete::create([
        'idgastosextrapaquete'=>5,
        'gastosextras_id'=>6,
        'paquete_id'=>4
      ]);
    }

}
