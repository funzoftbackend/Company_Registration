<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $password, $url)
    {
        $this->email = $email;
        $this->password = $password;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Account Details')->view('email.users');
    }
}

