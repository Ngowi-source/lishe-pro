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

    public function create()
    {
        $this->validate(request(), [
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed'
        ]);

        $user = User::create(['name'=>request('name'), 'email'=>request('email'), 'password'=>bcrypt('password')]);

        auth()->login($user);

        return redirect('/');
    }
}
