<?php

namespace App\Http\Controllers;

use App\Department;
use App\Mail\NewTicket;
use App\TicketReply;
use App\Tickets;
use App\TicketsAttach;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use shweshi\OpenGraph\OpenGraph;
use function GuzzleHttp\Promise\all;

class EditorjsController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkroles');
    }

    public function image(Request $request)
    {

        if ($request->url) {
            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => $request->url
                ]
            ]);
        }

        $filepath = Storage::disk('public')->put('tickets/images/', $request->file('image'));

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => url("storage/$filepath")
            ]
        ]);

    }

    public function attaches(Request $request)
    {
//        return Log::info($request);

        $filepath = Storage::disk('public')->put('tickets/attaches/', $request->file('file'));

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => url("storage/$filepath"),
                'name' => $request->file('file')->getClientOriginalName()
            ]
        ]);

    }

    public function link(Request $request)
    {
        $OpenGraph = new OpenGraph();

        $data = (object)$OpenGraph->fetch($request->url);

        return response()->json([
            'success' => 1,
            'meta' => [
                'title' => isset($data->title) ? $data->title : 'titolo',
                'description' => isset($data->description) ? $data->description : 'description',
                'image' => [
                    'url' => isset($data->image) ? $data->image : 'image',
                ],
            ]
        ]);
    }

    public function save(Request $request)
    {

        if (!\auth()->user()->department()->first()) {

            return response()->json(['message' => __('Non hai i permessi di scrittura per il reparto. Torna indietro')], 403);
        }

        $ticket = Tickets::findOrFail($request->id);

        if($ticket->whereHas('department', function ($query) {
                $query->where('status', 0);
            })->first()){

            return response()->json(['message' => __('il reparto in questione è momentaneamente non disponibile')], 403);
        }

        if (!$department = $ticket->department()->first()->user()->where('user_id', auth()->id())->first()) {

            return response()->json(['message' => __('access denied a questo reparto')], 403);
        }

        if (!$department->write) {

            return response()->json(['message' => __('non hai i permessi di scrittura per questo reparto')], 403);
        }

        if (empty($request->data['blocks'])) {

            return response()->json(['message' => __('non puoi pubblicare risposte vuote')], 401);
        }

        $ticketReply = new TicketReply();
        $ticketReply->user_id = \auth()->id();
        $ticketReply->ticket_id = $request->id;
        $ticketReply->row = serialize($request->data['blocks']);
        $ticketReply->save();

        $author = Tickets::find($request->id)->user()->first();
        $ticket = Tickets::find($request->id);

        $notSelf = \auth()->id() !== $author->id;

        if ($notSelf) {
            Mail::to($author->email)->send(new NewTicket($ticket));
        } else {

            $users = User::all();
            $department = $ticket->department()->first();
            foreach ($users as $user) {
                $role = $user->department()->where('department_id', $department->id)->first();

                if ($role && $role->listen > 0) {
                    if ($user->id !== $author->id) {
                        Mail::to($user->email)->send(new NewTicket($ticket));
                    }
                }
            }
        }

        return response()->json('success');
    }
}
