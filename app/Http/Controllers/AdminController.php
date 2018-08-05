<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $articles = Article::all();

        if(Auth::user()->id > 5)
        {
            return redirect()->to('/')->with([
                'adminerror' => 'You are not authorized as an administrator!'
            ]);
        }

        return view ('admin')->with([
            'users' => $users,
            'articles' => $articles,
        ]);
    }

    public function userdel($id)
    {
        $res = User::whereId($id)->delete();
        if($res)
        {
            return back()->with([
                'userdel' => 'User deleted successfully!'
            ]);
        }
        else
        {
            return back()->with([
                'userfail' => 'User could not be deleted!'
            ]);
        }
    }

    public function postdel($id)
    {
        $res = Article::whereId($id)->delete();
        if($res)
        {
            return back()->with([
                'postdel' => 'Article deleted successfully!'
            ]);
        }
        else
        {
            return back()->with([
                'postfail' => 'Article could not be deleted!'
            ]);
        }
    }
}
