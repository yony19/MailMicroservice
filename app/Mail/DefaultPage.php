<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class DefaultPage extends Mailable {

    use Queueable,
        SerializesModels;

    private $url;
    private $descripcion;

    public function __construct(Request $request)
    {
        $this->url = $request->input('message')['url'];
        $this->descripcion = $request->input('message')['description'];
    }

    public function build()
    {
        return $this->view('template_default')
                    ->with(
                        [
                            'descripcion' => $this->descripcion,
                            'url' => $this->url,
                        ]
                    );
    }
}