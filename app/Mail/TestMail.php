<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $request;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$request)
    {
        $this->details=$details;
        $this->request=$request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("user.mail",[
            "request"=>$this->request
        ]);
    }
}
