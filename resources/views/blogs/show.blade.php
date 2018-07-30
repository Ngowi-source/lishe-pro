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

    @if(session()->has('commentsuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('commentsuccess')}}</strong>&nbsp;
        </div>
    @endif

    @if(session()->has('replysuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('replysuccess')}}</strong>&nbsp;
        </div>
    @endif

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Learn Something New</h2>
        </div>
        <div id="blogSide">

            <div class="card w-100 border-success">

                <img class="card-img-top" src="https://c5.rgstatic.net/m/437738464651637/images/template/default/profile/profile_default_l.jpg" alt="Sauli Epimack">
                <div class="card-body">
                    <h5 class="card-title">Sauli John, Epimack MSc</h5>
                    <p class="card-text">
                        Research Scientist<br />
                        <span class="text-muted">Ifakara Health Institute</span>
                    </p>
                </div>
            </div>
            <br />

            {{--@if((Auth::check()) && (Auth::user()->id == 4))--}}
            <a href="/article/create"><button>Create New Article +</button></a>
            <br /><br />
            {{--@endif--}}

            <h4>Archives</h4>
            @foreach($archives as $stat)
                <a href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
            @endforeach

        </div>
        <div id="blogBod">

            <h2>{{$posted->title}}</h2>
            <span class="articleTime"><b>{{$posted->user->firstname}} {{$posted->user->lastname}}</b> on {{$posted->created_at->toFormattedDateString()}}</span><br /><br />

            <span class="articleBod">{!! $posted->body !!}</span><br /><br />
            <hr/>

            {{--<h3 class="text-center">Comments</h3>--}}

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
                <form action="/blog/{{str_replace(' ','-',$posted->title)}}/comment" method="POST" id="addComment">
                    {{csrf_field()}}
                    <h4>Say something about this article</h4>
                    <label for="newcomment"></label>

                    <textarea id="newcomment" type="text" class="form-control" name="body" placeholder="Login or register to comment" required></textarea>
                    <br />
                    <button type="submit" name="send" class="float-right">Add Comment</button>

                </form><br /><br />

                @if(count($posted->comments))

                    <ul class="list-group">
                    @foreach($posted->comments as $comment)

                        <li class="list-group-item">
                            <b class="text-left">{{$comment->user->firstname}} {{$comment->user->lastname}}</b>&nbsp;<span class="grey right"><i>{{$comment->created_at->diffForHumans()}}</i></span><br /><br />

                            <span class="large">{{$comment->body}}</span><br />

                            <span class="right reply" data-toggle="tooltip" title="Reply" data-id="{{$comment->id}}"><i class="fas fa-reply"></i></span>

                        </li>

                        @if(count($comment->replies))

                                <ul class="list-group replies">
                                    @foreach($comment->replies as $reply)

                                        <li class="list-group-item">
                                            <b class="text-left">{{$reply->user->firstname}} {{$reply->user->lastname}}</b>&nbsp;&nbsp;<span class="grey"><i>replied</i></span>&nbsp;<span class="grey right"><i>{{$reply->created_at->diffForHumans()}}</i></span><br /><br />

                                            {{$reply->body}}<br />
                                        </li>
                                    @endforeach
                                </ul>
                        @endif

                            <form id="reply_{{$comment->id}}" class="commentReplyForm" method="POST" action="/blog/{{str_replace(' ','-',$posted->title)}}/reply">
                                {{csrf_field()}}

                                <label for="newreply" ></label>

                                <textarea id="newreply" type="text" class="form-control" name="body" placeholder="Your reply" required></textarea>
                                <br />

                                <input type="hidden" value="{{$comment->id}}" name="cid" />

                                <button type="submit" name="send" class="float-right">Reply</button><br />
                            </form>

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

            $(".reply").click(function(){
                $id = $(this).data("id");

                $("#reply_"+$id).css('display', 'block');
            });
        });
    </script>

@endsection