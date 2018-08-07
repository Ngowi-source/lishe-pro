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

        $userEmailExists = User::whereEmail($request->email)->first();

        if ($userEmailExists)
        {
            return redirect()->to('/register')->with(['socialerror'=> 'The email for this social account has already been registered with another user!']);
        }
        else
        {
            $user = User::create(['firstname'=>$request->firstname, 'lastname'=>$request->lastname, 'email'=>$request->email, 'password'=>$request->password, 'status'=> 0]);

            auth()->login($user);

            try
            {
                Mail::to($user)->send(new AccountVerificationMail($user));
                return redirect('/')->with(['regsuccess'=> 'Welcome to LishePro!']);
            }
            catch(\Throwable $e)
            {
                return $e->getMessage();
            }

        }
    }

}
