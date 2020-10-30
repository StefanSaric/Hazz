<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin.users.allusers', ['active' => 'allUsers', 'users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        //setting encription for password
        $request->merge(array('password' => bcrypt($request->input('password'))));
        $user = User::create($request->all());
        $user->save();

        Session::flash('message', 'success_' . __('User is added!'));
        return redirect('admin/users');
    }
}
