<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetCode,$email,$url;

    public function __construct($resetCode,$email,$url)
    {
        $this->resetCode = $resetCode;
        $this->email = $email;
        $this->url = $url;
    }

    public function build()
    {
        return $this->markdown('email.reset_password')
                    ->with(['code' => $this->resetCode,'email' => $this->email,'url' => $this->url]);
    }
}
