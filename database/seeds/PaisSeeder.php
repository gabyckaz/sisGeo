<?php

use Illuminate\Database\Seeder;
use App\Pais as Pais;
use Faker\Factory as Faker;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  $faker = Faker::create();
      for ($i=0; $i < 9; $i++) {

        \DB::table('Pais')->insert(array(
         'nombrePais' => $faker->randomElement(['El Salvador','Guatemala','Honduras','Costa Rica','Belice','Nicaragua','Panama','Mexico','Peru']),
         'created_at' => date('Y-m-d H:m:s'),
         'updated_at' => date('Y-m-d H:m:s')
       ));
     }*/
     Pais::create([
       'IdPais'=>1,
       'nombrePais'=>'El Salvador',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>2,
       'nombrePais'=>'Costa Rica',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>3,
       'nombrePais'=>'Guatemala',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>4,
       'nombrePais'=>'Honduras',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>5,
       'nombrePais'=>'Belice',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>6,
       'nombrePais'=>'Nicaragua',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>7,
       'nombrePais'=>'Panama',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>8,
       'nombrePais'=>'Mexico',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

     Pais::create([
        'IdPais'=>9,
       'nombrePais'=>'Peru',
       'created_at'=>date('Y-m-d H:m:s'),
       'updated_at'=>date('Y-m-d H:m:s')
     ]);

    }
}
