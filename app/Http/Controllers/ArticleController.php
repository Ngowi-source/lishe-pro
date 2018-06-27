<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('blogs.index');
    }

    public function show()
    {
        return view('blogs.show');
    }
}
