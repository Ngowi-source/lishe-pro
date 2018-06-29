<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function create()
    {

        if(!Auth::attempt(['email'=>request('email'), 'password'=>request('password')])) {

            return back()->withErrors([
                'message' => 'Your login credentials are incorrect'
            ]);
        }
        /*
            if(!session()->has('url.intended'))
            {
                return redirect(URL::previous());
            }
            else
            {
                return redirect('/');
            }
        }*/
        return redirect('/');
    }
}
