<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        //fetch the latest articles
        $articles = Article::latest()->get();

        return view('home', compact('articles'));
    }

    public function sendMsg(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'msg' => 'required'
        ]);

        $objClient = new \stdClass();
        $objClient->name = $request['name'];
        $objClient->email = $request['email'];
        $objClient->msg = $request['msg'];

        try {
            Mail::to('bryceandy@rocketmail.com')->send(new ContactMessageMail($objClient));
            return Redirect::to('/')->with(['regsuccess'=> 'Your message was sent!']);
        }
        catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

}
