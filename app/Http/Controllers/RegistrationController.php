<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);
        $user = User::create(['firstname'=>$request->firstname, 'lastname'=>$request->lastname, 'email'=>$request->email, 'password'=>$request->password, 'status'=> 0]);

        auth()->login($user);

        return redirect('/')->with(['message'=> 'Welcome to LishePro, you are logged in!']);
    }
}
