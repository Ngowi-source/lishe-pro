<?php

namespace App\Http\Controllers;

use App\Notifications\NewReply;
use App\Notifications\NewComment;
use App\User;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', ]);
    }

    public function index()
    {
        /*$articles = Article::latest()->filter(request(['month', 'year']))->simplePaginate(4);*/
        $articles = Article::latest();

        if($month = request('month'))
        {
            $articles->whereMonth('created_at', $month);
        }

        if($year = request('year'))
        {
            $articles->whereYear('created_at', $year);
        }

        $articles = $articles->simplePaginate(4);

        $archives = Article::archives();

        return view('blogs.index', compact('articles', 'archives'));
    }

    public function show($title)
    {
        $posted = Article::where('title', '=', str_replace('-', ' ', $title))->first();

        if(isset($_GET['nots']))
        {
            DB::table('notifications')->where('id', '=', $_GET['nots'])->delete();
        }

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
            'title'=> 'required|max:50',
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
        //article object fetched
        $posted = Article::where('title', '=', str_replace('-', ' ', $title))->first();

        //validate comment input
        $this->validate(request(), [
            'body'=> 'required|min:2'
        ]);

        //create comment object and reply
        $comment = Comment::create([
            'article_id' => $posted->id,
            'body' => request('body'),
            'user_id'=> Auth::id()
        ]);

        //notify the owner of the article about a new comment
        $comenteeId = $posted->user_id;
        if($comenteeId != Auth::id())
        {
            User::whereId($comenteeId)->first()->notify(new NewComment($comment));
        }

        return back()->with(['commentsuccess'=> 'Your comment is added!']);
    }

    public function reply()
    {
        //validate reply input
        $this->validate(request(), [
            'body'=> 'required|min:2',
            'cid'=> 'integer'
        ]);

        //create reply object and send reply
        $reply = Reply::create([
            'comment_id' => request('cid'),
            'body' => request('body'),
            'user_id'=> Auth::id()
        ]);

        //send a notification to the owner of the comment
        $commented = Comment::whereId(request('cid'))->first();
        $replyeeId = $commented->user_id;

        if($replyeeId != Auth::id())
        {
            User::whereId($replyeeId)->first()->notify(new NewReply($reply));
        }

        //send a notification to other users who replied to the same comment
        $replied = Reply::whereCommentId(request('cid'))->get();
        foreach ($replied as $rep)
        {
            if($rep->user_id != Auth::id() && $rep->user_id != $replyeeId)
            {
                User::whereId($rep->user_id)->first()->notify(new NewReply($reply));
            }
        }

        return back()->with(['replysuccess'=> 'Your reply is sent!']);
    }

}
