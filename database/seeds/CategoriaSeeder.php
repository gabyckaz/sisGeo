<?php

use Illuminate\Database\Seeder;
use App\Categoria as Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Categoria::create([
    'IdCategoria'=>1,
    "NombreCategoria"=>'Playa',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);

 Categoria::create([
    'IdCategoria'=>2,
    "NombreCategoria"=>'Montaña',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
 Categoria::create([
    'IdCategoria'=>3,
    "NombreCategoria"=>'Lago',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
 Categoria::create([
    'IdCategoria'=>4,
    "NombreCategoria"=>'Pueblo',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
 Categoria::create([
    'IdCategoria'=>5,
    "NombreCategoria"=>'Rio',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
 Categoria::create([
    'IdCategoria'=>6,
    "NombreCategoria"=>'Aventuras',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
 Categoria::create([
    'IdCategoria'=>7,
    "NombreCategoria"=>'Ecoturismo',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
 Categoria::create([
    'IdCategoria'=>8,
    "NombreCategoria"=>'Turismo solidable',
    'created_at'=>date('Y-m-d H:m:s'),
    'updated_at'=>date('Y-m-d H:m:s')
  ]);
  Categoria::create([
     'IdCategoria'=>9,
     "NombreCategoria"=>'Arquelogico',
     'created_at'=>date('Y-m-d H:m:s'),
     'updated_at'=>date('Y-m-d H:m:s')
   ]);
    }
}
