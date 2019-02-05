<?php

use Illuminate\Database\Seeder;
use App\TipoTransporte as Tipo;
class TipoTransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Tipo::create([
        'IdTipoTransporte'=>1,
        'NombreTipoTransporte'=>'Bus'
      ]);
      Tipo::create([
        'IdTipoTransporte'=>2,
        'NombreTipoTransporte'=>'County'
      ]);
    }
}
