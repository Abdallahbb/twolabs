<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class appointment extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $subject;
    public $msg;
    /**
     * Create a new message instance.
     */
    public function __construct($appointment,$subject,$msg)
    {
        $this->appointment = $appointment;
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.appointment',
            with: [
                'appointment' => $this->appointment,
                'msg'=>$this->msg
            ]
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
