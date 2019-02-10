<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'id'=>1,
        'name'=>'Cesar',
        'IdPersona'=>1,
        'email'=>'cesar2mendez@gmail.com',
        'password'=>bcrypt('sisgeo2018'),
        'RecibirNotificacion'=>0,
        'EstadoUsuario'=>1,
        'remember_token'=>' ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'avatar'=>'default.gif'
      ]);
      User::create([
        'id'=>2,
        'name'=>'Yanira',
        'IdPersona'=>2,
        'email'=>'yanira@gmail.com',
        'password'=>bcrypt('geoturismo2019'),
        'RecibirNotificacion'=>1,
        'EstadoUsuario'=>1,
        'remember_token'=>' ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'avatar'=>'default.gif'
      ]);
      User::create([
        'id'=>3,
        'name'=>'Gabriela',
        'IdPersona'=>3,
        'email'=>'gaby_dva_@hotmail.com',
        'password'=>bcrypt('gaby2019'),
        'RecibirNotificacion'=>0,
        'EstadoUsuario'=>1,
        'remember_token'=>' ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'avatar'=>'default.gif'
      ]);
      User::create([
        'id'=>4,
        'name'=>'Victor',
        'IdPersona'=>4,
        'email'=>'torvik_33@hotmail.com',
        'password'=>bcrypt('victor2019'),
        'RecibirNotificacion'=>0,
        'EstadoUsuario'=>1,
        'remember_token'=>' ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'avatar'=>'default.gif'
      ]);
      User::create([
        'id'=>5,
        'name'=>'Guery',
        'IdPersona'=>5,
        'email'=>'guery.alas@ti.ues.edu.sv ',
        'password'=>bcrypt('guery2019'),
        'RecibirNotificacion'=>0,
        'EstadoUsuario'=>1,
        'remember_token'=>' ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'avatar'=>'default.gif'
      ]);
      User::create([
        'id'=>6,
        'name'=>'Karina',
        'IdPersona'=>6,
        'email'=>'liz_krina@hotmail.com',
        'password'=>bcrypt('karina2019'),
        'RecibirNotificacion'=>0,
        'EstadoUsuario'=>1,
        'remember_token'=>' ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'avatar'=>'default.gif'
      ]);
    }
}
