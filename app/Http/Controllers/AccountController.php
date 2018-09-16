<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function index($id)
    {
        //give user object
        $user = User::whereId($id)->first();

        return view('account', compact('user'));
    }

    public function userdel($id)
    {
        //delete user
        $res = User::whereId($id)->delete();
        if($res)
        {
            return redirect('/')->with([
                'accdel' => 'Account deleted successfully!'
            ]);
        }
        else
        {
            return back()->with([
                'accfail' => 'Account could not be deleted!'
            ]);
        }
    }
}
