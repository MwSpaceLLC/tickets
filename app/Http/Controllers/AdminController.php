<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admincheck');
    }

    public function departments()
    {
        return view('departments');
    }

    public function newdepartment(Request $request)
    {
        $department = new Department();
        $department->title = $request->title;
        $department->description = $request->description;
        $department->rgb = '#' . $request->rgb;
        $department->save();

        return back();
    }

    public function users()
    {
        return view('users');
    }


    public function userChange(Request $request)
    {
        $user = User::findOrFail($request->user);

        if ($user->role === 1) {
            return abort(503, __('non puoi disattivare un admin. Torna indietro'));
        }

        $user->active = !$request->active;
        $user->save();
        return back();
    }

}
