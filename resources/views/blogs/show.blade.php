@extends('templates.application')

@section('stylesheets')
    <link rel="stylesheet" href="{{'/css/app.css'}}">
@endsection

@section('title')
    Lishe Pro - Article
@endsection

@section('header')
    <span class="logo"><a href="/">Lishe Pro</a></span>
    <div class="nav-links">

        <a id="tools">Tools
            <div class="submenu">
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                <a href="/weight-loss-tracker">Weight Loss Tracker</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>
                <a href="/online-food-diary">Online Food Diary</a>
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/lishe-pro-well-and-Recipes">Lishe PRO-Well and Recipes</a>
        <a href="/blog">Blog</a>
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0))}}.</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endif
    </div>

@endsection

@section('content')

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Learn Something New</h2>
        </div>
        <div id="blogSide">
            <h4>Archives</h4>
            <a href="/">May 2018</a><br />
            <a href="/">April 2018</a><br />
            <a href="/">March 2018</a><br />
            <a href="/">February 2018</a><br />
            <a href="/">January 2018</a><br /><br />

            <a href="/article/create"><button>Create New Article +</button></a>
        </div>
        <div id="blogBod">

            <h2>{{$post->title}}</h2>
            <span class="articleTime"><b>{{$post->user->name}}</b> on {{$post->created_at->toFormattedDateString()}}</span><br /><br />

            <span class="articleBod">{{$post->body}}</span><br /><br />
            <hr/>

            <h3 class="text-center">Comments</h3>

            <div id="comments">

                @if(count($post->comments))

                    <ul class="list-group">
                    @foreach($post->comments as $comment)

                        <li class="list-group-item">
                            <span class="grey"><i>{{$comment->created_at->diffForHumans()}}</i></span><br />
                            <b class="text-left">{{$post->user->name}}</b> :<br />
                            {{$comment->body}}
                        </li>
                        <hr />
                    @endforeach
                    </ul>

                    @if(count($errors))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/blog/{{$post->id}}/comment" method="POST" id="addComment">
                        {{csrf_field()}}
                        <h4>Say something about this article:</h4>
                        <label for="newcomment"></label>

                        <textarea id="newcomment" type="text" class="form-control" name="body" placeholder="Your comment" required></textarea>

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <br />
                        <button type="submit" name="send" class="float-right">Add Comment</button>

                    </form>

                @else

                    @if(count($errors))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/blog/{{$post->id}}/comment" method="POST" id="addComment">
                        {{csrf_field()}}
                        <h4>Say something about this article</h4>
                        <label for="newcomment"></label>

                        <textarea id="newcomment" type="text" class="form-control" name="body" placeholder="Your comment" required></textarea>
                        <br />
                        <button type="submit" name="send" class="float-right">Add Comment</button>

                    </form>

                @endif

            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#header").css('background', 'linear-gradient(#D57030, #9BA747)');
            $(".nav-links a, .logo a").css('color', '#D9DCD8');
            $(".submenu a").css('color', 'grey');
        });
    </script>

@endsection