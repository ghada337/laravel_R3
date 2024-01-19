<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {   
        return $this->from($this->contact->email, $this->contact->name)
                    ->subject('New Contact Form Submission from ' . $this->contact->name)
                    ->view('emails.contact');
    }
}

