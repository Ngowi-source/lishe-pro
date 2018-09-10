<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    public function index()
    {
        //fetch the latest articles
        $articles = Article::latest()->get();

        return view('home', compact('articles'));
    }

}
