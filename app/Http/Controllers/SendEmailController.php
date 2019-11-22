<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DefaultPage;
use App\Mail\RecoveryPassword;
use App\User;
use Validator;
class SendEmailController extends Controller
{
    private $template;
    public function sendEmail(Request $request)
    { 
        $this->validate($request, [
            'email_to' => 'required|email',
            'message' => 'required'
        ]);

        $tipo_template = $request->input('template');
        $email_to = $request->input('email_to');

        if($tipo_template=='recoveryPassword'){
            $this->template = new RecoveryPassword($request);
        }else{
            $this->template = new DefaultPage($request);
        }
        
        Mail::to($email_to)->send($this->template);
        
        return response([
            'message' => 'Se envio de manera exitosa!',
            'status' => true]
        );
    }
}