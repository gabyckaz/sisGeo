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
      Personas::create([
        'IdPersona'=>2,
        'PrimerNombrePersona'=>'Yanira',
        'SegundoNombrePersona'=>'Paula',
        'PrimerApellidoPersona'=>'Guardado',
        'SegundoApellidoPersona'=>'Mendez',
        'Genero'=>'F',
        'AreaTelContacto'=>503,
        'TelefonoContacto'=>73578464,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Personas::create([
        'IdPersona'=>3,
        'PrimerNombrePersona'=>'Gabriela',
        'SegundoNombrePersona'=>'Denisse',
        'PrimerApellidoPersona'=>'Velasquez',
        'SegundoApellidoPersona'=>'Alvarez',
        'Genero'=>'F',
        'AreaTelContacto'=>503,
        'TelefonoContacto'=>79251555,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Personas::create([
        'IdPersona'=>4,
        'PrimerNombrePersona'=>'Victor',
        'SegundoNombrePersona'=>'Manuel',
        'PrimerApellidoPersona'=>'Martinez',
        'SegundoApellidoPersona'=>'Lopez',
        'Genero'=>'M',
        'AreaTelContacto'=>503,
        'TelefonoContacto'=>72788858,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Personas::create([
        'IdPersona'=>5,
        'PrimerNombrePersona'=>'Guery',
        'SegundoNombrePersona'=>'Salvador',
        'PrimerApellidoPersona'=>'Alas',
        'SegundoApellidoPersona'=>'Guardado',
        'Genero'=>'M',
        'AreaTelContacto'=>503,
        'TelefonoContacto'=>75929956,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Personas::create([
        'IdPersona'=>6,
        'PrimerNombrePersona'=>'Karina',
        'SegundoNombrePersona'=>'Lissette',
        'PrimerApellidoPersona'=>'Diaz',
        'SegundoApellidoPersona'=>'Mendez',
        'Genero'=>'F',
        'AreaTelContacto'=>503,
        'TelefonoContacto'=>73578464,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
