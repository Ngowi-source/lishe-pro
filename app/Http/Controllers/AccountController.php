<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function index($id)
    {
        $user = User::whereId($id)->first();

        return view('account', compact('user'));
    }

    public function userdel($id)
    {
        $res = User::whereId($id)->delete();
        if($res)
        {
            return redirect('/')->with([
                'userdel' => 'User deleted successfully!'
            ]);
        }
        else
        {
            return back()->with([
                'userfail' => 'Account could not be deleted!'
            ]);
        }
    }
}