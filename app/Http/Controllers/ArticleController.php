<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comments;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', ]);
    }

    public function index()
    {
        $articles = Article::latest();

        /*if($month = request('month'))
        {
            $articles->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = request('year'))
        {
            $articles->whereYear('created_at', Carbon::parse($year)->year);
        }*/

        $articles = $articles->simplePaginate(3);

        $archives = Article::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();

        return view('blogs.index')->with([
            'articles' => $articles,
            'archives' => $archives,
        ]);
    }

    public function show(Article $post)
    {
        return view('blogs.show',compact('post'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|max:25',
            'body'=> 'required|min:35'
        ]);

        Article::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> Auth::id()
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
            'user_id'=> Auth::id()
        ]);

        return back();
    }

}
