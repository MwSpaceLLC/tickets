<?php

namespace App\Http\Controllers;

use App\Department;
use App\Mail\NewTicket;
use App\TicketReply;
use App\Tickets;
use App\TicketView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function foo\func;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkroles');
    }

    public function new()
    {
        return view('theme.' . config('app.theme') . '.tickets.new');
    }

    public function open(Request $request)
    {

        if (!Department::first()) {

            return abort(403, __('Nessun dipartimento al momento. Torna indietro'));
        }

        if(!Department::findOrFail($request->department)){

            return abort(403, __('il reparto in questione non esiste'));
        }

        if (!\auth()->user()->department()->first()) {

            return abort(403, __('Non hai accesso a nessun reparto. Torna indietro'));
        }

        if (!$department = \auth()->user()->department()->where('department_id', $request->department)->first()) {

            return abort(403, __('Non hai accesso a questo reparto. Torna indietro'));
        }

        if(!Department::findOrFail($request->department)->status){

            return abort(403, __('il reparto in questione è momentaneamente non disponibile'));
        }

        if (!$department->write) {

            return abort(403, __('Non hai i permessi di scrittura per il reparto. Torna indietro'));
        }

        $ticket = new Tickets();
        $ticket->user_id = \auth()->id();
        $ticket->department_id = $request->department;
        $ticket->subject = $request->subject;
        $ticket->save();

        return redirect("/ticket/{$ticket->id}");
    }

    public function list(Request $request)
    {
        if ($request->status === 'open' || $request->status === 'working') {
            $request->status = 1;
        }

        if ($request->status === 'closed') {
            $request->status = 2;
        }

        $tickets = isset($request->status) ?
            Tickets::where('status', $request->status)->get() :
            Tickets::get();

        return view('theme.' . config('app.theme') . '.tickets.list')->with('tickets', $tickets);
    }

    public function show(Request $request)
    {
        $ticket = Tickets::findOrFail($request->id);

        if (!\auth()->user()->department()->first()) {

            return abort(503, __('Non hai accesso a nessun reparto. Torna indietro'));
        }

        if (!$department = \auth()->user()->department()->where('department_id', $ticket->department()->first()->id)->first()) {

            return abort(503, __('Non hai accesso a questo reparto. Torna indietro'));
        }

        if (!$department->read) {

            return abort(503, __('Non hai i permessi di lettura per il reparto. Torna indietro'));
        }

        if (!$ticket->views()->where('user_id', Auth::id())->first()) {
            $ticketViews = new TicketView();
            $ticketViews->user_id = Auth::id();
            $ticketViews->ticket_id = $ticket->id;
            $ticketViews->save();
        }

        $ticket = Tickets::findOrFail($request->id);

        return view('theme.' . config('app.theme') . '.tickets.show')->with('ticket', $ticket);
    }

    public function close(Request $request)
    {

        $ticket = Tickets::findOrFail($request->id);
        $ticket->status = $request->status;
        $ticket->save();

        return back();

    }

    public function changeDp(Request $request){

        if(\auth()->user()->admin()){
            $oldTicket = Tickets::findOrFail($request->ticket);
        } else {
            $oldTicket = \auth()->user()->tickets()->findOrFail($request->ticket);
        }

        $oldReply = $oldTicket->replies()->findOrFail($request->reply);

        $ticket = new Tickets();
        $ticket->user_id = $oldTicket->user()->first()->id;
        $ticket->department_id = $request->department;
        $ticket->subject = $request->subject;
        $ticket->save();

        $ticketReply = new TicketReply();
        $ticketReply->user_id = $ticket->user_id;
        $ticketReply->ticket_id = $ticket->id;
        $ticketReply->row = $oldReply->row;
        $ticketReply->save();

        $oldReply->delete();

        if(!$oldTicket->replies()->first()){
            $oldTicket->views()->delete();
            $oldTicket->delete();
        }

        return redirect("/ticket/{$ticket->id}");

    }

}
