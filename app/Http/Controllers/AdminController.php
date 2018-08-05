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

        if(Auth::user()->id > 20)
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
}
