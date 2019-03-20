<?php

use Illuminate\Database\Seeder;
use App\EmpresaAlquilerTransporte as Empresa;
class EmpresaAlquilerTransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Empresa::create([
        'IdEmpresaTransporte'=>1,
        'NombreEmpresaTransporte'=>'AyC Alquileres',
        'NombreContacto'=>'Armando Cáceres',
        'NumeroTelefonoContacto'=>'50322554488',
        'EmailEmpresaTransporte'=>'ayc@alquileres.com'
      ]);
      Empresa::create([
        'IdEmpresaTransporte'=>2,
        'NombreEmpresaTransporte'=>'Transportes La Luna',
        'NombreContacto'=>'Mariana Luna',
        'NumeroTelefonoContacto'=>'50225489632',
        'EmailEmpresaTransporte'=>'transportesluna@gmail.com',
        'ObservacionesEmpresaTransporte'=>'Siempre son puntuales',
      ]);
      Empresa::create([
        'IdEmpresaTransporte'=>3,
        'NombreEmpresaTransporte'=>'Viajes TXD',
        'NombreContacto'=>'Daniel Torres',
        'NumeroTelefonoContacto'=>'50326558841',
        'EmailEmpresaTransporte'=>'danielt@viajestdx.com',
        'ObservacionesEmpresaTransporte'=>'Ninguna',
      ]);
    }
}
