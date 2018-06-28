<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('home', compact('articles'));
    }

    public function in()
    {

        return view('hn');
    }
}
