<?php

namespace App\Http\Controllers;

use App\Mail\NewTicket;
use App\TicketReply;
use App\Tickets;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TinyController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkroles');
    }


    public function save(Request $request)
    {

        if (!\auth()->user()->department()->first()) {

            return response()->json(['message' => __('Non hai i permessi di scrittura per il reparto. Torna indietro')], 403);
        }

        $ticket = Tickets::findOrFail($request->id);

        if ($ticket->whereHas('department', function ($query) {
            $query->where('status', 0);
        })->first()) {

            return response()->json(['message' => __('il reparto in questione è momentaneamente non disponibile')], 403);
        }

        if (!$department = $ticket->department()->first()->user()->where('user_id', auth()->id())->first()) {

            return response()->json(['message' => __('access denied a questo reparto')], 403);
        }

        if (!$department->write) {

            return response()->json(['message' => __('non hai i permessi di scrittura per questo reparto')], 403);
        }

        if (empty($request->data)) {

            return response()->json(['message' => __('non puoi pubblicare risposte vuote')], 401);
        }

        $ticketReply = new TicketReply();
        $ticketReply->user_id = \auth()->id();
        $ticketReply->ticket_id = $request->id;
        $ticketReply->row = $request->data;
        $ticketReply->save();

        $author = Tickets::find($request->id)->user()->first();
        $ticket = Tickets::find($request->id);

        $notAuthor = \auth()->id() !== $author->id;

        if ($notAuthor) {
            /**
             * Send mail to ticket request mail author
             */
            Mail::to($author->email)->send(new NewTicket($ticket));
        } else {

            /**
             * Send mail to all listener peaple
             */
            $users = User::all();
            $department = $ticket->department()->first();
            foreach ($users as $user) {
                $role = $user->department()->where('department_id', $department->id)->first();

                if ($role && $role->manage > 0) {
                    if ($user->id !== $author->id) {
                        Mail::to($user->email)->send(new NewTicket($ticket));
                    }
                }
            }
        }

        return response()->json('success');
    }

    public function MailTheme()
    {
        $string = file_get_contents(resource_path('views/emails/tickets/new.blade.php'));
        $string = str_replace('', '', $string);
        $string = file_get_contents(resource_path('views/emails/tickets/new.blade.php'));
        $string = file_get_contents(resource_path('views/emails/tickets/new.blade.php'));
        $string = file_get_contents(resource_path('views/emails/tickets/new.blade.php'));

        return \response()->json(file_get_contents(resource_path('views/emails/tickets/new.blade.php')));
    }
}
