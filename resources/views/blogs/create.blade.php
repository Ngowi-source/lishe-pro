@extends('templates.application')

@section('stylesheets')

    <script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{'/css/app.css'}}">

@endsection

@section('title')
    Lishe Pro - New Article
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
            <h2>Create New Article</h2>
        </div>
        <div id="blogSide">

            <h4>Archives</h4>
            @foreach($archives as $stat)
                <a href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
            @endforeach

        </div>
        <div id="blogBod">

            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/articles" id="createForm">
                {{csrf_field()}}

                <label for="title">Title</label>
                <input id="title" name="title" type="text" class="form-control" required/><br />

                <label for="bodyid">Body</label>
                <textarea id="bodyid" name="body" class="form-control" required></textarea><br />

                <script>

                    ClassicEditor
                        .create( document.querySelector( '#bodyid' ) );

                </script>

                <button type="submit" class="form-control" id="createButton">
                    Post Article
                </button>
            </form>


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