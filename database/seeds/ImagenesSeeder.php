<?php

use Illuminate\Database\Seeder;
use App\ImagenPaqueteTuristico as Imagen;
class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Imagen::create([
        'idimagenpaqueteturistico'=>1,
        'imagen1'=>'http://nebula.wsimg.com/a72d096a8b13e9ae17590bd1fe866314?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1',
        'imagen2'=>'http://nebula.wsimg.com/4157d3dd0c864717888d1c6568b128a0?AccessKeyId=028FA07779C6F82B5AD2&disposition=0&alloworigin=1',
        'imagen3'=>'http://nebula.wsimg.com/8cc68f958658637407a8cb7703f0a6a6?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1',
        'imagen4'=>'https://drive.google.com/file/d/18arQ28BEduqNC7OGaXuUlwFlumOehTtu/view',
        'id_paquete'=>1,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
