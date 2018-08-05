<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $articles = Article::all();

        return view ('admin')->with([
            'users' => $users,
            'articles' => $articles,
        ]);
    }
}
