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
    }
}
