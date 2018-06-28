<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login()
    {

    }
}
