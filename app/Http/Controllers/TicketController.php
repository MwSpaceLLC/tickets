<?php

namespace App\Http\Controllers;

use App\Tickets;
use App\TicketView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $ticket = new Tickets();
        $ticket->user_id = Auth::id();
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
            Tickets::where('status', $request->status)->paginate(8) :
            Tickets::paginate(8);

        return view('theme.' . config('app.theme') . '.tickets.list')->with('tickets', $tickets);
    }

    public function show(Request $request)
    {
        $ticket = Tickets::findOrFail($request->id);

        if (!$ticket->views()->where('user_id', Auth::id())->first()) {
            $ticketViews = new TicketView();
            $ticketViews->user_id = Auth::id();
            $ticketViews->ticket_id = $ticket->id;
            $ticketViews->save();
        }

        return view('theme.' . config('app.theme') . '.tickets.show')->with('ticket', Tickets::findOrFail($request->id));
    }

    public function close(Request $request)
    {

        $ticket = Tickets::findOrFail($request->id);
        $ticket->status = $request->status;
        $ticket->save();

        return back();

    }

}
