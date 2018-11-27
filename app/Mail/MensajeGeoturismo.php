<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Mensaje;

class MensajeGeoturismo extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $mensaje; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mensaje $mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->from('torvik@example.com')
                    ->view('mail.mailEnvioView');
    }
}
