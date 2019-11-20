<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class TemplateMail extends Mailable {
 
    use Queueable,
        SerializesModels;

    private $mensaje;

    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->view('template_email')
                    ->with(
                        [
                            'mensaje' => $this->mensaje
                        ]
                    );
    }
}