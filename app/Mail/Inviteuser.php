<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Inviteuser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return 
            $this->from('hourworks33@gmail.com')
            ->subject('An Invite to Task Manager')
            ->view('emails.invite.invite')
            ->with([
                "url" => url('/'), "data" => $this->data
            ]);
    }
}
