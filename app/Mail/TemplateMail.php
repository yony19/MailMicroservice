<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use EmailIterface;
 
class TemplateMail extends Mailable {
 
    use Queueable,
        SerializesModels;

    private $mensaje;

    public function __construct($request)
    {
        $this->mensaje = $mensaje;
        /*
        $email_to = $request->input('email_to');
        $template = $request->input('template');
        $url = $request->input('message')['url'];
        $descripcion = $request->input('message')['description'];*/
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