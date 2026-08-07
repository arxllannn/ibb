<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriberBroadcast extends Mailable
{
    use Queueable, SerializesModels;
    public $subjectContent;
    public $emailContent;

    /**
     * Create a new message instance.
     */
    public function __construct($subjectContent, $emailContent)
    {
        $this->subjectContent = $subjectContent;
        $this->emailContent = $emailContent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectContent,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
       // $parsedContent = $this->parseHtmlContent($this->emailContent);
        // return new Content(
        //     view: 'emails.subscriber_broadcast', // Use a regular Blade view
        //     with: [
        //         'emailContent' => $this->emailContent, // Pass email content
        //     ]
        // );

        return new Content(
            markdown: 'emails.subscriber_broadcast',
            with: [
                'emailContent' => $this->emailContent, // Pass the email content to the view
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
