<?php

use Illuminate\Database\Seeder;
use App\Itinerario as Itinerario;
class IntinerarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Itinerario::create([
        'iditinerario'=>1,
        'nombreitinerario'=>'6:30 a.m. Salida San Salvador.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>2,
        'nombreitinerario'=>'8:30 a.m. Desayuno Jardín Celeste.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>3,
        'nombreitinerario'=>'9:40 a.m. Visita Iglesia Ataco y Telares',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>4,
        'nombreitinerario'=>'10:20 a.m. Cielito Lindo',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>5,
        'nombreitinerario'=>'11:20a.m. #RETO del Laberinto',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>6,
        'nombreitinerario'=>'1:20 a.m. Festival Gastronómico de Juayua  o Chorros de la Calera!! ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>7,
        'nombreitinerario'=>'4:00 p.m. Visita Salcoatitan. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>8,
        'nombreitinerario'=>'Dia 1: 3:00 Salida ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>9,
        'nombreitinerario'=>'Dia 1: 11:00 am Biotopo del Quetzal ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>10,
        'nombreitinerario'=>'Dia 1: 12:00 md Almuerzo en Coban. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>11,
        'nombreitinerario'=>'Dia 1: 5:30 pm. Cobán  ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>12,
        'nombreitinerario'=>'Dia 1: 7:00 p.m. Estamos en Lankin  ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>13,
        'nombreitinerario'=>'Dia 1: 8:00 p.m. Nos hospedaremos en Hostal ecológico de las Marías.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>14,
        'nombreitinerario'=>'Dia 2: 8:00 a.m. Visitaremos las cuevas de las Marías. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>15,
        'nombreitinerario'=>'Dia 2: 1:00 p.m. Caminar 800 mts hasta llegar al parque de semuc Champey. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>16,
        'nombreitinerario'=>'Dia 2: 6:00 p.m. Cena Hotel.​ ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>17,
        'nombreitinerario'=>'Dia 3: 7:00 a.m. Saldremos en pick up rumbo a Lankin ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>18,
        'nombreitinerario'=>'Dia 3: 7:00 a.m. 9:00 a.m. Visita a las cuevas de Lankin',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>19,
        'nombreitinerario'=>'Dia 3: 1:00 pm Almuerzo en la ciudad de Coban',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>20,
        'nombreitinerario'=>'Dia 3: 6:00 pm. Frontera Guatemala El Salvador',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>21,
        'nombreitinerario'=>'Dia 3: 8:00 p.m Fin del viaje.​',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>22,
        'nombreitinerario'=>'04:00 am - salida desde Gasolinera Uno Frente al Mundo Feliz (Domicilio sumar $5.00 Area de SS)​',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>23,
        'nombreitinerario'=>'10:00 am - Tour por sitio arqueológico Ruinas de Copan, Tour por las Sepulturas',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>24,
        'nombreitinerario'=>'1:00 pm - almuerzo libre',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>25,
        'nombreitinerario'=>'1:30 pm - Visita opcional Parque de Aves y Reserva Natural Montaña Guacamaya o de compras por la ciudad de Copan.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>26,
        'nombreitinerario'=>'8:30 pm - finalización del tour',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>27,
        'nombreitinerario'=>'Dia 1: 1:00 a.m Salida Gasolinera Uno que esta frente al mundo feliz. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>28,
        'nombreitinerario'=>'Dia 1: 5:00 a.m. Frontera El Salvador, Honduras. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>29,
        'nombreitinerario'=>'Dia 1: 11:00 a.m. Frontera Honduras Nicaragua tiempo para cambiar dinero en la frontera existes un banco, hay que llevare el DUI o el PASAPORTE para poder cambiar.  ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>30,
        'nombreitinerario'=>'Dia 1: 3:00 pm. Almuerzo y tour por la ciudad de León. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>31,
        'nombreitinerario'=>'Dia 1: 4:00 p.m. Caminata a la Cruz de San Juan del Sur, la entrada cuesta $3 dólares',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>32,
        'nombreitinerario'=>'Dia 2: Visita libre',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>33,
        'nombreitinerario'=>'Dia 3: 6 a.m. Salida de San Juan del Sur ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>34,
        'nombreitinerario'=>'Dia 3: 8:30 a.m. Desayuno en Masaya y visita al Mercado ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>35,
        'nombreitinerario'=>'Dia 3: 11:00 a.m. Volcán de Masaya',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>36,
        'nombreitinerario'=>'Dia 3: 3:00 p.m. Visita Granada Nicaragua, Tour en lancha por los Islote',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>37,
        'nombreitinerario'=>'Dia 3: 5:00 p.m. Recomendamos que alquiles una hora de bicicleta y puedes conocer las calles de Granda',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>38,
        'nombreitinerario'=>'Dia 3: 6:00 pm. Noche de Bar en Granada.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>39,
        'nombreitinerario'=>'Dia 4: 4:00 a.m. Salida de Granada ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>40,
        'nombreitinerario'=>'Dia 4: 8:00 p.m. San Salvador. ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>41,
        'nombreitinerario'=>'Dia 1: 7 p.m. Salida Metro centro San Salvador, Gasolinera Uno Frente al Mundo Feliz.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>42,
        'nombreitinerario'=>'Dia 2: 12:00 p.m. Tours en Granada / Volcán Masaya/ Isletas /  noche libre',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>43,
        'nombreitinerario'=>'Dia 3: 4:00 a.m. Frontera Costa Rica Nicaragua',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>44,
        'nombreitinerario'=>'Dia 3: 11:30 a.m. llegada a Safari África',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>45,
        'nombreitinerario'=>'Dia 3: 6:30 p.m. Hostal Rio Celeste ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>46,
        'nombreitinerario'=>'Dia 4: 7:15 a.m. Desayuno en el restaurante',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>47,
        'nombreitinerario'=>'Dia 4: 8:00 a.m. Visita al árbol de la paz ',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>48,
        'nombreitinerario'=>'Dia 4: 8:45 a.m. Llegada al Parque y registro',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>49,
        'nombreitinerario'=>'Dia 4: 9:00 a.m. Inicio del caminata por Rio Celeste',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>50,
        'nombreitinerario'=>'Dia 4: 5:00 p.m. Salimos rumbo a la frontera de Nicaragua  Costas Rica, noche en  San Juan del Sur',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
      Itinerario::create([
        'iditinerario'=>51,
        'nombreitinerario'=>'Dia 5: 1:00 a.m. Rumbo a San Salvador.',
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s')
      ]);
    }
}
