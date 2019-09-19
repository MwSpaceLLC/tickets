<?php

namespace App\Http\Controllers;

use App\Department;
use App\DepartmentUser;
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
        return view('theme.' . config('app.theme') . '.departments');
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
        return view('theme.' . config('app.theme') . '.users');
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

    public function userManage(Request $request)
    {
        $user = User::findOrFail($request->user);

        if ($user->role === 1 && !auth()->user()->admin()) {
            return abort(503, __('Non puoi modificare un admin. Torna indietro'));
        }

        return view('theme.' . config('app.theme') . '.user')
            ->with('user', $user);
    }

    public function userUpdate(Request $request)
    {
        $user = User::findOrFail($request->user);

        if ($user->role === 1 && !auth()->user()->admin()) {
            return abort(503, __('Per ora, un admin può fare tutto. Torna indietro'));
        }

        /**
         * @force reset role
         */
        $user->department()->where('user_id',$user->id)->delete();


        if (!$request->department) {
            return back();
        }

        foreach ($request->department as $key => $array) {
            if (!$department = Department::find($key)) {

                return abort(503, __('Trovato dipartimento inesistente. Torna indietro'));
            }

            $departmentUser = new DepartmentUser();

            if ($role = $user->department()->where('department_id', $key)->first()) {
                $departmentUser = $role;
            }

            $departmentUser->user_id = $user->id;
            $departmentUser->department_id = $key;
            $departmentUser->write = 0;
            $departmentUser->read = 0;
            $departmentUser->listen = 0;

            /**
             * @force override
             */
            foreach ($array as $key => $val) {
                $departmentUser->$key = ($val === 'on') ? 1 : 0;
            }

            $departmentUser->save();

        }

        return back();

    }

}
