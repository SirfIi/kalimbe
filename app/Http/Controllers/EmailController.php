<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;

class EmailController extends Controller
{
    public function send(Request $request){
        $title = 'Bienvenue sur Youmann';
        $content = $request->input('email');
       
        $mail = '';
       


        $res = response()->json(['message' => 'Request completed']);  
        return $res;    
    }
}
