<?php

use Illuminate\Database\Seeder;
use App\Persona as Personas;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Personas::create([
        'IdPersona'=>1,
        'PrimerNombrePersona'=>'Cesar',
        'SegundoNombrePersona'=>'Camilo',
        'PrimerApellidoPersona'=>'Guerrero',
        'SegundoApellidoPersona'=>'Mendez',
        'Genero'=>'M',
        'AreaTelContacto'=>503,
        'TelefonoContacto'=>70167238,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
