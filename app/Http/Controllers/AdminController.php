<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $articles = Article::all();

        //restrict page view to admin only
        if(!Gate::allows('isAdmin'))
        {
            return redirect('/')->with([
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
        $idd = base64_decode($id);

        //deleting users
        $res = User::whereId($idd)->delete();
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
        $idd = base64_decode($id);

        //deleting posts
        $res = Article::whereId($idd)->delete();
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
