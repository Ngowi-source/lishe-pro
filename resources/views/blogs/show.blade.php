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

        <a id="tools">Dietary Assessment Tools
            <div class="submenu">
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                <a href="/weight-loss-tracker">Weight Loss Tracker</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>
                <a href="/online-food-diary">Online Food Diary</a>
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/blog">Blog</a>
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0, 1))}}.</a>
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

            {{--@if((Auth::check()) && (Auth::user()->id == 4))--}}
            <a href="/article/create"><button>Create New Article +</button></a>
            {{--@endif--}}<br /><br />

            <h4>Archives</h4>
            @foreach($archives as $stat)
                <a href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
            @endforeach

        </div>
        <div id="blogBod">

            <h2>{{$post->title}}</h2>
            <span class="articleTime"><b>{{$post->user->firstname}} {{$post->user->lastname}}</b> on {{$post->created_at->toFormattedDateString()}}</span><br /><br />

            <span class="articleBod">{{$post->body}}</span><br /><br />
            <hr/>

            <h3 class="text-center">Comments</h3>

            <div id="comments">

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

                </form><br /><br />

                @if(count($post->comments))

                    <ul class="list-group">
                    @foreach($post->comments as $comment)

                        <li class="list-group-item">
                            <b class="text-left">{{$comment->user->firstname}} {{$comment->user->lastname}}</b>&nbsp;<span class="grey"><i>{{$comment->created_at->diffForHumans()}}</i></span><br /><br />

                            <span class="large">{{$comment->body}}</span><br />

                            <span class="right reply" data-toggle="tooltip" title="Reply" data-id="{{$comment->id}}"><i class="fas fa-reply"></i></span>

                        </li>

                        <form id="reply_{{$comment->id}}" class="commentReplyForm" method="POST" action="/blog/{{$post->id}}/reply">
                            <label for="newreply" ></label>

                            <textarea id="newreply" type="text" class="form-control" name="body" placeholder="Your reply" required></textarea>
                            <br />

                            <button type="submit" name="send" class="float-right">Reply</button>
                        </form><br />

                        @if(count($comment->replies))

                                <ul class="list-group">
                                    @foreach($comment->replies as $reply)

                                        <li class="list-group-item">
                                            <b class="text-left">{{$reply->user->firstname}} {{$reply->user->lastname}}</b>&nbsp;<span class="grey"><i>{{$reply->created_at->diffForHumans()}}</i></span><br /><br />

                                            {{$reply->body}}<br />
                                        </li>
                                    @endforeach
                                </ul>
                        @endif
                        <hr />
                    @endforeach
                    </ul>

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

           /* $(".reply").click(function(){
                $id = $(this).data("id");

                $("#reply_"+$id).css('display', 'block');
            });*/
        });
    </script>

@endsection