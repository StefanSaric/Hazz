<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(Request $request)
    {

        if (Auth::user() == null) {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect("/admin");
            }
        } else {
            return redirect("/admin");
        }
        return redirect()->back();
    }

    public function login() {
        return view('login');
    }

    public function logout()
    {
        request()->session()->regenerate(true);
        request()->session()->flush();
        return redirect('login');
    }
}
