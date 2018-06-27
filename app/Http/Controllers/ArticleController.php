<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('blogs.index', compact('articles'));
    }

    public function show(Article $post)
    {
        return view('blogs.show',compact('post'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title'=> 'required|max:25',
            'body'=> 'required|min:35'
        ]);

        Article::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect('/blog');
    }
}
