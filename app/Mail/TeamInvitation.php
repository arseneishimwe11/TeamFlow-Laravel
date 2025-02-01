<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $inviteData;

    public function __construct($inviteData)
    {
        $this->inviteData = $inviteData;
    }

    public function build()
    {
        return $this->markdown('emails.team.invitation')
            ->subject('Invitation to join TeamFlow');
    }
}
