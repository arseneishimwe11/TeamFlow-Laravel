<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeTeamMember extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $name;

    public function __construct($password, $name)
    {
        $this->password = $password;
        $this->name = $name;
    }

    public function build()
    {
        return $this->markdown('emails.team.welcome')
                    ->subject('Welcome to TeamFlow');
    }
}
