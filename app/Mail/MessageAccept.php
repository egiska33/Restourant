<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageAccept extends Mailable
{
    use Queueable, SerializesModels;


    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.messageAccept')->with([
            'messageEmail' => $this->message->email,
            'messageSubject' => $this->message->subject,
            'messageMessage' => $this->message->message,
            ]);
    }
}
