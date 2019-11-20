<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TemplateMail;
use App\User;
use Validator;
class SendEmailController extends Controller
{
    public function sendEmail(Request $request)
    { 
        $this->validate($request, [
            'email_to' => 'required|email',
            'message' => 'required'
        ]);
        $email_to = $request->input('email_to');
        $message = $request->input('message');

        Mail::to($email_to)->send(new TemplateMail($message));

        return response([
            'message' => 'Se envio de manera exitosa!',
            'status' => true]
        );
    }
}