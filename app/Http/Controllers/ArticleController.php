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
        $articles = Article::latest()->filter(request(['month', 'year']))->simplePaginate(3);
        /*$articles = Article::latest();

        if($month = request('month'))
        {
            $articles->whereMonth('created_at', $month);
        }

        if($year = request('year'))
        {
            $articles->whereYear('created_at', $year);
        }

        $articles = $articles->simplePaginate(3);*/

        $archives = Article::selectRaw("extract(year from created_at) as year, to_char(min(created_at), 'month') as monthname, extract(month from created_at) as month, count(*) as published")->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();

        return view('blogs.index', compact('articles', 'archives'));
    }

    public function show(Article $post)
    {
        $archives = Article::selectRaw("extract(year from created_at) as year, to_char(min(created_at), 'month') as monthname, extract(month from created_at) as month, count(*) as published")->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
        return view('blogs.show',compact('post', 'archives'));
    }

    public function create()
    {
        $archives = Article::selectRaw("extract(year from created_at) as year, to_char(min(created_at), 'month') as monthname, extract(month from created_at) as month, count(*) as published")->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
        return view('blogs.create', compact('archives'));
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
