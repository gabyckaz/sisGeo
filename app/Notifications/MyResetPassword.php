<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends ResetPassword
{


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notificacion para restablecer contraseña')
            ->line('Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
            ->action(('Restablecer la contraseña'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.');
    }


}
