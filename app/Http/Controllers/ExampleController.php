<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index(){
        return view('template_email')
                    ->with(
                        [
                            'descripcion' => "POR FAVOR PARA RECUPERAR SU CONTRASES A",
                            'url' => "https://bitzua.com",
                        ]
                    );
    }
    //
}
