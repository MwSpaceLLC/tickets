<?php

namespace App\Http\Controllers;

use App\Department;
use App\Pipe;
use Illuminate\Http\Request;

class PipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admincheck');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addServer(Request $request)
    {
        if (Pipe::where('username', $request->username)->first()) {
            return abort(403, 'Account Piper giá presente nel database');
        }

        $pipe = new Pipe();
        $pipe->status = 0;
        $pipe->host = $request->host;
        $pipe->port = $request->port;
        $pipe->username = $request->username;
        $pipe->password = $request->password;
        $pipe->encryption = $request->encryption;
        $pipe->save();

        return back();
    }

    public function piperChange(Request $request)
    {
        $pipe = Pipe::findOrFail($request->pipe);
        $pipe->status = !$request->active;
        $pipe->save();
        return back();
    }

    public function piperDepartment(Request $request)
    {
        $pipe = Pipe::findOrFail($request->pipe);

        /**
         * Precheck for sanitize selection mail piper department
         */
        foreach (Department::all() as $item) {
            if ($item->mail_id === $pipe->id) {
                $item->mail_id = null;
                $item->save();
            }
        }
        /** @save new pipe mail */
        $department = Department::findOrFail($request->department);
        $department->mail_id = $pipe->id;

        $department->save();
        return back();
    }
}
