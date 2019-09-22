<?php

namespace App\Http\Controllers;

use App\Department;
use App\Mail\NewTicket;
use App\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        return view('theme.' . config('app.theme') . '.welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('theme.' . config('app.theme') . '.home');
    }

    public function settings()
    {
        return view('theme.' . config('app.theme') . '.settings');
    }

    public function testmail(Request $request)
    {
        Mail::to($request->email)->send(new NewTicket(Tickets::first()));

    }

}
