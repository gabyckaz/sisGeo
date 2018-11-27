<?php

namespace App\Listeners;

use App\Events\MessageWasRecived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeGeoturismo;
use App\Mensaje;
use App\User;
use Carbon\Carbon;

class SendAutoresponder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageWasRecived  $event
     * @return void
     */
    public function handle(MessageWasRecived $event)
    {
        try{
           $date = Carbon::now();
          // $msj mensaje= new Mensaje();
           $msj = Mensaje::find(1);
           $msj->fechaEnvio = $date;
           //$msj->de ="GEOTURISMO TRAVEL & TOURS EL SALVADOR";
           //$msj->cuerpoMensaje="Le saludamos de Geoturismo, para informale que tenemos disponible un viaje que a usted le puede interesar, esperamos que nos pueda acompañar";
           $msj->url = "http://sisgeo.dev.com:89/MostrarPaqueteCliente/".$event->mensaje->url;
          // $msj->save();
          // Model::where('column_1','value_1')->where('column_2','value_2')->get();
         $listaCorreosEnviar = User::where('RecibirNotificacion',1)
                              ->where('EstadoUsuario',1)
                              ->pluck('email');
        // dd($listaCorreosEnviar[0]);
         //$user2 = User::findOrFail(25);
         
         Mail::to($listaCorreosEnviar)->send(new MensajeGeoturismo($msj)); 

        }catch(\Exception $e){
         \Log::debug('Test var fails :' . $e->getMessage());
       }
    }
}
