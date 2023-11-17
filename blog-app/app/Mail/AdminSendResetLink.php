<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Mail\Mailables\Address;

class AdminSendResetLink extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $email;
    /**
     * Create a new message instance.
     */
    public function __construct($token,$email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('sameer.mohsinideas@gmai.com', 'Sameer Ideas'),
            subject: 'Password Reset Link',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.reset-link-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
