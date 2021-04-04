<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $passwordResetLink;

    public function __construct($user, $passwordResetLink)
    {
        $this->user = $user;
        $this->passwordResetLink = $passwordResetLink;
    }

    public function build()
    {
        return $this->subject('Forgot Password')
            ->view('emails.forgot-password');
    }
}
