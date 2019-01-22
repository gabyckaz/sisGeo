<?php

use Illuminate\Database\Seeder;
use App\Paquete as Paquete;
class PaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Paquete::create([
        'idpaquete'=>1,
        'nombrepaquete'=>'Parque Nacional El Imposible',
        'fechasalida'=>'2019-04-13',
        'horasalida'=>'06:00:00',
        'fecharegreso'=>'2019-04-13',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>20,
        'tipopaquete'=>'Nacional',
        'cupos'=>25,
        'dificultad'=>'Media',
        'galeria'=>'https://www.facebook.com/pg/geoturismo/photos/?tab=album&album_id=1224693864216285',
        'video'=>'<iframe width="811" height="456" src="https://www.youtube.com/embed/nJV4BQZ0bY0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>0,
        'disponibilidadpaquete'=>0,
        'idturistica'=>1,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
