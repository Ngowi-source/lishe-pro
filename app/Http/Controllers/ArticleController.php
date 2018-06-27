<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('blogs.index');
    }

    public function show(Article $post)
    {
        return view('blogs.show');
    }

    public function create()
    {
        return view('blogs.create');
    }
}
