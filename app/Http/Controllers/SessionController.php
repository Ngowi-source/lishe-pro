<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function show()
    {
        return view('auth.login');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function create()
    {

        if(!auth()->attempt(['email'=>request('email'), 'password'=>request('password')])) {

            return back()->withErrors([
                'message' => 'Your login credentials are incorrect'
            ]);
        }

        return redirect('/');
    }
}
