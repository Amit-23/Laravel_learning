<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // Import the ShouldQueue interface
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TaskAssignedMail extends Mailable implements ShouldQueue // Implement ShouldQueue here
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Get the message envelope.
     */

     //we provide metadata here
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Task Assigned',
        );
    }

    /**
     * Get the message content definition.
     */

     //defines the content of the email, here also specify what view to be used for rendering the email
    public function content(): Content
    {
        return new Content(
            view: 'emails.task_assigned',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
