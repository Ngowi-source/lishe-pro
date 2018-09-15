<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('destroy', 'verify');
    }

    public function show()
    {
        Session::put('url.intended',URL::previous());
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
            return Redirect::to(Session::get('url.intended'))->with(['loginsuccess'=> 'Welcome ']);
        } else
            {
            return back()->withErrors([
                'message' => 'Your login credentials are incorrect'
            ]);
        }

    }

    public function verify($code)
    {
        $id = base64_decode($code);
        $valid = User::whereId($id)->update(['status' => true]);

        if($valid)
        {
            auth()->logout();
            return redirect('/login')->with([
                'verified' => 'Your account has been verified!'
            ]);
        }
    }
}
