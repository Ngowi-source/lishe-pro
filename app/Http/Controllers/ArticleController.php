<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comments;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $articles = Article::latest()->simplePaginate(3);

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
            'title'=>request('title'),
            'body'=>request('body'),
            'user_id'=> auth()->id
        ]);

        return redirect('/blog');
    }

    public function comment(Article $post)
    {
        $this->validate(request(), [
            'body'=> 'required|min:2'
        ]);

        Comments::create([
            'article_id' => $post->id,
            'body' => request('body'),
            'user_id'=> auth()->user()->id
        ]);

        return back();
    }

}
