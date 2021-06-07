<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
    
        $details=[
            "title"=>"Mail from berkan",
        ];

        Mail::to("anilegekara@gmail.com")->send(new TestMail($details,$request));
        return back();
    }
}
