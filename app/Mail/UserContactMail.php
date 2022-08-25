<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $userdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userdetails)
    {
        $this->userdetails = $userdetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Craftgenie')->view('email.sendUserMail');
    }
}
