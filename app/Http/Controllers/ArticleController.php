<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Reply;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', ]);
    }

    public function index()
    {
        /*$articles = Article::latest()->filter(request(['month', 'year']))->simplePaginate(3);*/
        $articles = Article::latest();

        if($month = request('month'))
        {
            $articles->whereMonth('created_at', $month);
        }

        if($year = request('year'))
        {
            $articles->whereYear('created_at', $year);
        }

        $articles = $articles->simplePaginate(3);

        $archives = Article::archives();

        return view('blogs.index', compact('articles', 'archives'));
    }

    public function show($title)
    {
        $posted = Article::where('title', '=', str_replace('-', ' ', $title))->first();

        $archives = Article::archives();
        return view('blogs.show',compact('posted', 'archives'));
    }

    public function create()
    {
        $archives = Article::archives();
        return view('blogs.create', compact('archives'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|max:25',
            'body'=> 'required'
        ]);

        Article::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> Auth::id()
        ]);

        return redirect('/blog')->with(['articlesuccess'=> 'Your article is posted!']);
    }

    public function comment($title)
    {
        $posted = Article::where('title', '=', str_replace('-', ' ', $title))->first();

        $this->validate(request(), [
            'body'=> 'required|min:2'
        ]);

        Comment::create([
            'article_id' => $posted->id,
            'body' => request('body'),
            'user_id'=> Auth::id()
        ]);

        return back()->with(['commentsuccess'=> 'Your comment is added!']);
    }

    public function reply()
    {

        $this->validate(request(), [
            'body'=> 'required|min:2',
            'cid'=> 'integer'
        ]);

        Reply::create([
            'comment_id' => request('cid'),
            'body' => request('body'),
            'user_id'=> Auth::id()
        ]);

        return back()->with(['replysuccess'=> 'Your reply is sent!']);
    }

}
