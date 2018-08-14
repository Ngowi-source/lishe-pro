@extends('templates.application')

@section('title')
    Lishe Pro - Blog
@endsection

@section('header')

    <span class="logo"><a href="/">Lishe Pro</a></span>
    <div class="nav-links">

        <div class="menu">
            <div class="menubar"></div><br />
            <div class="menubar ndChild"></div><br />
            <div class="menubar"></div>
        </div>

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
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0, 1))}}.</a>
        @else
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Register</a>
        @endif
    </div>

@endsection

@section('content')

    @if(session()->has('articlesuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('articlesuccess')}}</strong>&nbsp;
        </div>
    @endif

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Learn Something Today</h2>
        </div>

        <div id="blogSide">

            {{--@if((Auth::check()) && (Auth::user()->id == 4))--}}
            <a class="sideInline" href="/article/create"><button>New Article&nbsp; <i class="fas fa-plus"></i>&nbsp;</button></a>
            {{--@endif--}}<br class="sideDel"/><br class="sideDel"/>

            <div class="sideInline">
                <h4 class="archToggle">Archives</h4>
                @foreach($archives as $stat)
                    <a class="archLink" href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
                @endforeach
            </div>

        </div>

        <div id="blogBod">

            @foreach($articles as $article)
                <h3><a href="/blog/{{str_replace(' ','-',$article->title)}}">{{$article->title}}</a></h3>
                <span class="articleTime"><b >{{$article->user->firstname}} {{$article->user->lastname}}</b> on {{$article->created_at->toFormattedDateString()}}</span><br /><br />

                <span class="articleBod">@if(strlen(preg_replace('/<p><img(.*)>/', '', $article->body))>400){!! substr(preg_replace('/<p><img(.*)>/', '', $article->body),0,400) !!}... <span class="readMore"><a href="/blog/{{str_replace(' ','-',$article->title)}}"><i>Read More</i></a></span> @else{!! preg_replace('/<p><img(.*)>/', '', $articles->body) !!}@endif</span><br />
                <span class="articleTime"><a href="/blog/{{str_replace(' ','-',$article->title)}}"><i>{{count($article->comments)}} comments</i></a></span>
                <hr/> <br />
            @endforeach

            {{$articles->links()}}
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $(".archToggle").click(function(){
                $(".archLink").fadeToggle;
            });
        });
    </script>

@endsection