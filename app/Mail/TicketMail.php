<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Ticket $ticket, public string $ticket_template)
    {
        $this->ticket = $ticket;
        $this->ticket_template = $ticket_template;
    }

    public function build() {
        return $this->view('emails.ticket_'.$this->ticket_template)
                    ->with([
                        'ticket' => $this->ticket,
                    ]);
    }
    
}
