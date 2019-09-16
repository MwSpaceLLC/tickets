<?php

namespace App\Http\Controllers;

use App\TicketReply;
use App\TicketsAttach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use shweshi\OpenGraph\OpenGraph;

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
//        return Log::info($request);

        $OpenGraph = new OpenGraph();

        $data = (object)$OpenGraph->fetch($request->url);

        return response()->json([
            'success' => 1,
            'meta' => [
                'title' => isset($data->title)?$data->title:'titolo',
                'description' => isset($data->description)?$data->description:'description',
                'image' => [
                    'url' => isset($data->image)?$data->image:'image',
                ],
            ]
        ]);
    }

    public function save(Request $request)
    {

        $ticketReply = new TicketReply();
        $ticketReply->user_id = Auth::id();
        $ticketReply->ticket_id = $request->id;
        $ticketReply->row = serialize($request->data['blocks']);
        $ticketReply->save();

        return response()->json('success');
    }
}
