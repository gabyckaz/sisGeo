<?php

use Illuminate\Database\Seeder;
use App\Mensaje as Mensaje;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Mensaje::create([
        'id'=>1,
        'fechaEnvio'=>date('Y-m-d'),
        'de'=>'Geoturismo El Salvador',
        'cuerpoMensaje'=>'Te invitamos a que conozcas nuestra nueva excursión
                          y vivas una experiencia increíble, visita nuestro sitio y forma parte del espíritu Geo',
        'url'=>'sisgeo.com',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
