<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\SendConfirmationMail;

class MailSendController extends Controller
{
    public function send(){
        $to = [
            [
                'email' => 'rnrnrnrn.0518@gmail.com',
                'name' => '購入完了！',
            ]
            
        ];
        
        Mail::to('rnrnrnrn.0518@gmail.com')
            ->send(new SendConfirmationMail());
    }
}
