<?php

use Illuminate\Database\Seeder;
use App\Role as Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Roles::create([
        'id'=>1,
        'name'=>'Admin',
        'display_name'=>'Admin',
        'description'=>'Es el rol de usuario administrador de todo el sistema',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Roles::create([
        'id'=>2,
        'name'=>'User',
        'display_name'=>'User',
        'description'=>'Es el usuario del sistema o cliente del sistema',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Roles::create([
        'id'=>3,
        'name'=>'Director',
        'display_name'=>'Director',
        'description'=>'Es el director de geoturismo encargo de administrar el sistema',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Roles::create([
        'id'=>4,
        'name'=>'Agente',
        'display_name'=>'Agente',
        'description'=>'Es el agente de viajes de geoturismo que se encarga de llevar el control de los paquetes turisticos',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
