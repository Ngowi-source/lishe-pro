<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordRecoveryMail;

class RecoveryController extends Controller
{
    public function mailUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $account = User::where('email', '=', $request['email'])->exists();

        if($account)
        {
            $user = User::whereEmail($request['email'])->first();
            try
            {
                $objUser = new \stdClass();
                $objUser->firstname = $request->firstname;
                $objUser->id = $user->id;

                Mail::to($request->email)->send(new PasswordRecoveryMail($objUser));
                return redirect('/login')->with(['mailsuccess'=> 'Check your email for a password reset link!']);
            }
            catch(\Throwable $e)
            {
                return $e->getMessage();
            }

        }
        else
        {
            return back()->withErrors([
                'message' => 'Your email is not registered with us!'
            ]);
        }
    }

    public function index($code)
    {
        $id = base64_decode($code);
        $user = User::whereId($id)->first();

        return view('auth.reset')->with(['user' => $user]);
    }

    public function reset($code, Request $request)
    {
        $id = base64_decode($code);

        $this->validate($request, [
            'password' => 'required|password'
        ]);

        try
        {
            $request['password'] = bcrypt($request->password);

            User::whereId($id)->update(['passord' => $request->password]);

            return redirect()->to('/login')->with([
                'updatesuccess' => 'Your password has been reset, please login!'
            ]);
        }
        catch(\Throwable $e)
        {
            return $e->getMessage();
        }

    }
}
