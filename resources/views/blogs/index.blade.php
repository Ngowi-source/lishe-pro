@extends('templates.application')

@section('title')
    Lishe Pro - Blog
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
            <h2>Learn Something Today</h2>
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

            @foreach($articles as $article)
                <h3><a href="/blog/{{$article->id}}">{{$article->title}}</a></h3>
                <span class="articleTime"><b >{{$article->user->firstname}} {{$article->user->lastname}}</b> on {{$article->created_at->toFormattedDateString()}}</span><br /><br />

                <span class="articleBod">@if(strlen($article->body)>400){{substr($article->body,0,400)}}... <span class="readMore"><a href="/blog/{{$articles->id}}"><i>Read More</i></a></span> @else{{$articles->body}}@endif</span><br />
                <span class="articleTime"><a href="/blog/{{$article->id}}"><i>{{count($article->comments)}} comments</i></a></span>
                <hr/> <br />
            @endforeach

            {{$articles->links()}}
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