<?php

use Illuminate\Database\Seeder;
use App\RutaTuristica as Ruta;
class RutaTuristicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Ruta::create([
        'idrutaturistica'=>1,
        'nombrerutaturistica'=>'El imposible',
        'datosgenerales'=>'El Imposible es una selva, en partes tropical y en otros sub-tropicales. Ubicada sobre la Sierra de Apaneca Ilamatepeque, posee la mayor biodiversidad en el país, con un bosque maduro, típico de los inicios de Mesoramérica.',
        'descripcionrutaturistica'=>'Salimos de Metrocentro San Salvador a las 6:20 de la mañana, pasamos a Sonsonate a desayunar y comprar provisiones.Llegamos al Parque más grande de El Salvador, El Imposible, conocemos el museo interpretativo del parque, y es hora de una de las mayores experiencias que podrá tener caminaremos por los senderos del parque hasta el Rio Los Enganches, caminata que pondrá a prueba nuestro amor por la naturaleza y nuestro esfuerzos físicos.',
        'idpais'=>1,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>2
      ]);
      Ruta::create([
        'idrutaturistica'=>2,
        'nombrerutaturistica'=>'Ruta de las Flores',
        'datosgenerales'=>'La Ruta de las Flores, se ubica trasladándose desde la ciudad capital en la carretera que conduce a la Ciudad de Sonsonate, hasta la carretera que conduce a la Cordillera de Apaneca. El acceso es a través de carretera pavimentada de dos carriles y denominación CA-8 Después de pasar la ciudad de Sonsonate y antes de llegar a la ciudad de Ahuachapán encontrará la Ruta de las Flores que está conformada por la Ciudad de Ataco, Apaneca, Salcoatitán, Juayua y Nahuizalco.',
        'descripcionrutaturistica'=>'La Ruta de las Flores es una de las zonas más visitadas de nuestro país comenzamos el viaje conociendo Jardín Celeste los detalles hacen que nos trasportemos a una época pasado,  un rico desayuno.',
        'idpais'=>1,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>6
      ]);
      Ruta::create([
        'idrutaturistica'=>3,
        'nombrerutaturistica'=>'Expedición a Rio Celeste',
        'datosgenerales'=>'​Entre los lugares que planificamos visitar esta: la  Hermosa ciudad de Granada, Rio Celeste, Árbol de la Paz (Uno de los más grande de centroamerica), además visitaremos uno de los parques temáticos más impresionante el parque África Safari Costa Rica que es un  Parque Temático de Animales Africanos y de Actividades de Aventura.',
        'descripcionrutaturistica'=>'Una leyenda local narra que las aguas del río Celeste tienen ese color porque, cuando Dios terminó de pintar el cielo, lavó los pinceles en el agua de este río',
        'idpais'=>2,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>6
      ]);
      Ruta::create([
        'idrutaturistica'=>4,
        'nombrerutaturistica'=>'Semuc Champey',
        'datosgenerales'=>'​ Exploración a Semuc Champey Increíble, Fascinante, Realmente vale la pena disfrutar de esta experiencia. Viaja a un mundo diferente a tu alcance, para muchos uno de los lugares más bellos de Centroamérica',
        'descripcionrutaturistica'=>' Semuc Champey (donde el río se esconde en la montaña), es un enclave natural localizado próximo al municipio guatemalteco de Lanquín (a 467 km de San Salvador), en el departamento de Alta Verapaz, Guatemala.',
        'idpais'=>3,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>5
      ]);
      Ruta::create([
        'idrutaturistica'=>5,
        'nombrerutaturistica'=>'Copan',
        'datosgenerales'=>'​Copán Ruinas está localizada en el occidente de Honduras, en el Departamento de Copán, a sólo 14 kilómetros de la frontera El Florido con Guatemala.',
        'descripcionrutaturistica'=>'Uno de los centros arqueológicos más investigados a partir de otro fenómeno natural es provocado por el Rio Copán, que circunda por la parte este del sitio principal, ocasionando la erosión y dejando un corte arqueológico de forma natural.',
        'idpais'=>4,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>9
      ]);
      Ruta::create([
        'idrutaturistica'=>6,
        'nombrerutaturistica'=>'Cayos de Belice',
        'datosgenerales'=>'​Los cayos, los atolls y el arrecife son de las principales atracciones de Belice. El Arrecife, el cual mide 185 millas de largo, es el más grande del Hemisferio del Este. Los Cayos son islas localizadas entre tierra firme y el arrecife.',
        'descripcionrutaturistica'=>'En esta aventura podrás visitar la Reserva Marina Cayos Sapodilla, la cual consta de varias islas de arena y manglar, los jardines de coral poco profundos de la reserva son el principal atractivo debido a sus colores vibrantes y una excelente visibilidad.',
        'idpais'=>5,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>1
      ]);
      Ruta::create([
        'idrutaturistica'=>7,
        'nombrerutaturistica'=>'Nicaragua',
        'datosgenerales'=>'León fue capital de Nicaragua, ahora León es una ciudad con alma Sandinista. Esta ciudad colonial es una de las más accesibles para conocer en todos los aspectos. La geología y el vulcanismo han moldeado dos magníficos tipos de playas en el Pacíifico nicaragüense.',
        'descripcionrutaturistica'=>'La céntrica ciudad de Masaya es un destino cultural importante debido a las latentes expresiones folclóricas populares que se originaron y manifiestan allí, como bailes, música, teatro callejero y coloridas procesiones. La céntrica ciudad de Masaya es un destino cultural importante debido a las latentes expresiones folclóricas populares que se originaron y manifiestan allí, como bailes, música, teatro callejero y coloridas procesiones.',
        'idpais'=>6,
        'created_at'=>date('Y-m-d H:m:s'),
        'updated_at'=>date('Y-m-d H:m:s'),
        'idcategoria'=>4
      ]);
    }
}
