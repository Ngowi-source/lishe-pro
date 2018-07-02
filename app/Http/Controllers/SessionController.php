<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    use AuthenticatesUsers;

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

        return redirect('/')->with(['outsuccess'=> 'You have been logged out!']);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email'=> $request->email, 'password'=> $request->password]))
        {
            return redirect('/');
        } else
            {
            return back()->withErrors([
                'message' => 'Your login credentials are incorrect'
            ]);
        }

    }
}
