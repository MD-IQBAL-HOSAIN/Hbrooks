<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class YourMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->emailData['subject']);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.contact', with: ['emailData' => $this->emailData]);
    }

    public function attachments(): array
    {
        return [];
    }
}
