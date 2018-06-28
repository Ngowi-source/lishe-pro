<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SessionController extends Controller
{
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

        if(!(auth()->attempt(request(['email', 'password']))))
        {
            return back()->withErrors([
                'message'=> 'Your login credentials are incorrect'
            ]);
        }
        else
        {

            if(!session()->has('url.intended'))
            {
                return redirect(URL::previous());
            }
            else
            {
                return redirect('/');
            }
        }
    }
}
