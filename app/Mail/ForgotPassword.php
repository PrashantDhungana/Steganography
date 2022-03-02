<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    private $imageLink;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $user = User::where('email',$email)->first();
        $this->imageLink = $user->filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forgot-password',['imageLink'=>$this->imageLink])->subject('Forgot Password | Image Steganography');
    }
}
