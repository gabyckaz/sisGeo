<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('PaisSeeder');
        $this->call('NacionalidadSeeder');
        $this->call('RolesSeeder');
        $this->call('MensajeSeeder');
        $this->call('PersonasSeeder');
        $this->call('UserSeeder');
        $this->call('RolesUserSeeder');
        $this->call('CategoriaSeeder');
        $this->call('IdiomaSeeder');
        $this->call('RutaTuristicaSeeder');
        $this->call('CondicionesSeeder');
        $this->call('GastosExtrasSeeder');
        $this->call('IncluyeSeeder');
        $this->call('IntinerarioSeeder');
        $this->call('RecomendacionesSeeder');
        $this->call('PaquetesSeeder');
        $this->call('ImagenesSeeder');
        $this->call('CondicionesPaqueteSeeder');
        $this->call('IncluyePaqueteSeeder');
        $this->call('ItinerarioPaqueteSeeder');
        $this->call('GastosExtrasPaqueteSeeder');
        $this->call('RecomendacionesPaqueteSeeder');
    }
}
