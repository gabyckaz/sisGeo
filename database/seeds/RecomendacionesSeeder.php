<?php

use Illuminate\Database\Seeder;
use App\Recomendaciones as Recomendacion;
class RecomendacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Recomendacion::create([
        'idrecomendaciones'=>1,
        'nombrerecomendaciones'=>'Ropa fresca  ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>2,
        'nombrerecomendaciones'=>'Zapatos cómodos',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>3,
        'nombrerecomendaciones'=>'Cámara Fotográfica ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>4,
        'nombrerecomendaciones'=>'Repelente de Insecto',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>5,
        'nombrerecomendaciones'=>'Bloqueador',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>6,
        'nombrerecomendaciones'=>'Algunos Snack para el camino',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>7,
        'nombrerecomendaciones'=>'Lámpara, si es solar mejor.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>8,
        'nombrerecomendaciones'=>'Repelente de insectos o una pulsera contra estos.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>9,
        'nombrerecomendaciones'=>'Ropa de baño y zapatos acuaticos.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>10,
        'nombrerecomendaciones'=>'Alimentación no perecedera para 4 tiempos.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>11,
        'nombrerecomendaciones'=>'Llevar un galón de agua.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Recomendacion::create([
        'idrecomendaciones'=>12,
        'nombrerecomendaciones'=>'Bebidas hidratantes. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);

    }
}
