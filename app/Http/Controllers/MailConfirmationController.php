<?php

namespace App\Http\Controllers;

use App\Mail\SendConfirmationMail;

use Illuminate\Http\Request;

use Mail;

class MailConfirmationController extends Controller
{
    public function send(){
        $to = [
            [
                'email' => 'rnrnrnrn.0518@gmail.com',
                'name' => '購入完了！',
                ]
        ];
        
        Mail::to('rnrnrnrn.0518@gmail.com')
            ->send(new ConfirmationMail());
    }
}