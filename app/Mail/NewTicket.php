<?php

namespace App\Mail;

use App\Pipe;
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

        $from = config('app.from');

        $department = $this->ticket->department()->first();

        if ($pipe = Pipe::where('id', $department->mail_id)->first())
            $from = $pipe->username;

        return $this
            ->from($from)
            ->subject("Ticket: #{$this->ticket->id} [{$this->ticket->subject}]")
            ->view('emails.tickets.new')
            ->with('ticket', $this->ticket);
    }
}


