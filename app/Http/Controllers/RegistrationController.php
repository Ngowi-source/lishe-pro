<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function create()
    {

    }
}
