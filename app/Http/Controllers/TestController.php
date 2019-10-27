<?php

namespace App\Http\Controllers;

use App\Pipe;
use App\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admincheck');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function testMail()
    {
        if (!$ticket = Tickets::first())
            return abort(403, 'NON HAI NESSUN TICKET PER TESTARE IL TEMPLATE HTML5');

        if (!$ticket->replies()->first())
            return abort(403, "NON HAI NESSUNA RISPOSTA AL TICKET #{$ticket->id} PER TESTARE IL TEMPLATE HTML5");

        return view('emails.tickets.new')->with('ticket', $ticket);
    }

    /**
     * @param Request $request
     */
    public function testPiper(Request $request)
    {
        if (!$ticket = Pipe::first())
            return abort(403, 'NON HAI NESSUN PIPER PER TESTARE IL CRON JOB');

        Artisan::call('piper:check');
        echo "{$request->header('User-Agent')}<br>";
        echo "<b>Imap Cron Job</b> has been complete!";

        return exit();
    }
}
