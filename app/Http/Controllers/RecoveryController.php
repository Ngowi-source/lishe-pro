<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RecoveryController extends Controller
{
    public function mailUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        if(User::where('email', '=', $request['email'])->exists())
        {
            return redirect('/login')->with(['mailsuccess'=> 'Check your email for a password reset link!']);
        }
        else
        {
            return back()->withErrors([
                'message' => 'Your email is not registered with us!'
            ]);
        }
    }
}
