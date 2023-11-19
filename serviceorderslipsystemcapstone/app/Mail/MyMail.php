<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $details2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        
       
    }
     
    public function __construct2($details2)
    {
        $this->details2 = $details2;
        
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from CompuSource Computer Center')
        ->view('emails.myMail');
        
        
       
    }

    public function build2()
    {
        return $this->subject('Mail from CompuSource Computer Center')
        ->view('emails.myMail2');
       
    }
}
