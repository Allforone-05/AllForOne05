<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('ca140611@gmail.com')
                    ->subject('Mensaje de Contacto')
                    ->view('emails.contact'); // Crea una vista de correo electrónico en resources/views/emails/contact.blade.php
    }
}
