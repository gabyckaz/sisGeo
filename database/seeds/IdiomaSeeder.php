<?php

use Illuminate\Database\Seeder;
use App\Idioma as Idioma;
class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Idioma::create([
        'ididioma'=>1,
        'idioma'=>'Español',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>2,
        'idioma'=>'Ingles',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>3,
        'idioma'=>'Frances',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>4,
        'idioma'=>'Portugues',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>5,
        'idioma'=>'Mandarin',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>6,
        'idioma'=>'Alemán',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>7,
        'idioma'=>'Ruso',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>8,
        'idioma'=>'Chino',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>9,
        'idioma'=>'Japones',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Idioma::create([
        'ididioma'=>10,
        'idioma'=>'Italiano',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
