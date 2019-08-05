<?php

namespace Premmohantyagi\Contact\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $firstname;
    public $lastname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $firstname, $lastname)
    {
        $this->message = $message;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contact::contact.email')->with(['message'=>$this->message, 'firstname' => $this->firstname, 'lastname' => $this->lastname]);
    }
}
