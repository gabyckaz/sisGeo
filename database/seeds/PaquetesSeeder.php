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
      Paquete::create([
        'idpaquete'=>2,
        'nombrepaquete'=>'Ruta de las Flores',
        'fechasalida'=>'2019-03-30',
        'horasalida'=>'06:00:00',
        'fecharegreso'=>'2019-03-30',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>15,
        'tipopaquete'=>'Nacional',
        'cupos'=>30,
        'dificultad'=>'Media',
        'galeria'=>'https://www.facebook.com/pg/geoturismo/photos/?tab=album&album_id=841165165902492',
        'video'=>'<iframe width="812" height="457" src="https://www.youtube.com/embed/hrIHZhuwDuE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>1,
        'disponibilidadpaquete'=>1,
        'idturistica'=>2,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Paquete::create([
        'idpaquete'=>3,
        'nombrepaquete'=>'SEMUC CHAMPEY 3 DIAS DOS NOCHES',
        'fechasalida'=>'2019-03-23',
        'horasalida'=>'03:00:00',
        'fecharegreso'=>'2019-03-26',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>150,
        'tipopaquete'=>'Internacional',
        'cupos'=>30,
        'dificultad'=>'Alta',
        'galeria'=>'https://www.facebook.com/pg/geoturismo/photos/?tab=album&album_id=1667241706628163',
        'video'=>'<iframe width="812" height="457" src="https://www.youtube.com/embed/mf0yiVll2zI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>0,
        'disponibilidadpaquete'=>0,
        'idturistica'=>4,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Paquete::create([
        'idpaquete'=>4,
        'nombrepaquete'=>'COPAN VIAJE DE DIA',
        'fechasalida'=>'2019-04-21',
        'horasalida'=>'04:00:00',
        'fecharegreso'=>'2019-04-21',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>35,
        'tipopaquete'=>'Internacional',
        'cupos'=>30,
        'dificultad'=>'Alta',
        'galeria'=>'https://www.facebook.com/pg/geoturismo/photos/?tab=album&album_id=938643806154627',
        'video'=>'<iframe width="812" height="457" src="https://www.youtube.com/embed/8MRmXrHyEKo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>1,
        'disponibilidadpaquete'=>1,
        'idturistica'=>5,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Paquete::create([
        'idpaquete'=>5,
        'nombrepaquete'=>'NICARAGUA 4 DIAS 3 NOCHES',
        'fechasalida'=>'2019-05-11',
        'horasalida'=>'01:00:00',
        'fecharegreso'=>'2019-04-15',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>225,
        'tipopaquete'=>'Internacional',
        'cupos'=>45,
        'dificultad'=>'Media',
        'galeria'=>'https://www.facebook.com/pg/geoturismo/photos/?tab=album&album_id=1029310733754600',
        'video'=>'<iframe width="812" height="457" src="https://www.youtube.com/embed/HTze0Rg_XYw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>0,
        'disponibilidadpaquete'=>0,
        'idturistica'=>7,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Paquete::create([
        'idpaquete'=>6,
        'nombrepaquete'=>'COSTA RICA EXPEDICIÓN A RIO CELESTE',
        'fechasalida'=>'2019-08-02',
        'horasalida'=>'19:00:00',
        'fecharegreso'=>'2019-08-06',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>299,
        'tipopaquete'=>'Internacional',
        'cupos'=>45,
        'dificultad'=>'Media',
        'galeria'=>'https://www.facebook.com/pg/geoturismo/photos/?tab=album&album_id=1029310733754600',
        'video'=>'<iframe width="570" height="321" src="https://www.youtube.com/embed/tGzetzJ67HU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>0,
        'disponibilidadpaquete'=>0,
        'idturistica'=>3,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Paquete::create([
        'idpaquete'=>7,
        'nombrepaquete'=>'CAYOS DE BELICE ',
        'fechasalida'=>'2019-07-19',
        'horasalida'=>'04:00:00',
        'fecharegreso'=>'2019-07-24',
        'lugarregreso'=>'Gasolinera UNO, Boulevar de los Héroes',
        'precio'=>199,
        'tipopaquete'=>'Internacional',
        'cupos'=>45,
        'dificultad'=>'Media',
        'galeria'=>'https://www.facebook.com/geoturismo/photos/a.346243198728027/2171895569496105/?type=3&theater',
        'video'=>'<iframe width="812" height="457" src="https://www.youtube.com/embed/d9U6zYrcASc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        'aprobacionpaquete'=>0,
        'disponibilidadpaquete'=>0,
        'idturistica'=>6,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
