<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountVerificationMail;

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

        $accountVerifier = new \stdClass();
        $accountVerifier->sender = 'Lishe Pro';
        $accountVerifier->receiver = $request->firstname.' '.$request->lastname;
        $accountVerifier->email = $request->email;

        Mail::to($request->email)->send(new AccountVerificationMail($accountVerifier));

        return redirect('/')->with(['regsuccess'=> 'Welcome to LishePro! Please click a link sent in your email to verify your account']);
    }

}
