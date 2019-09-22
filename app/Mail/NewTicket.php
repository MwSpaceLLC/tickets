<?php

namespace App\Mail;

use App\Tickets;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Tickets
     */
    protected $ticket;

    /**
     * NewTicket constructor.
     * @param Tickets $ticket
     */
    public function __construct(Tickets $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('app.from'))
            ->subject(__('NUOVA RISPOSTA AL TICKET #') . $this->ticket->id)
            ->view('emails.tickets.new')
            ->with('ticket', $this->ticket);
    }
}
