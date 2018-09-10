@extends('templates.application')

@section('title')
    Lishe Pro - Administration
@endsection

@section('header')
    <span class="logo"><a href="/">Lishe <span class="pro">Pro</span></a></span>
    <div class="nav-links">

        <div class="menu">
            <div class="menubar"></div><br />
            <div class="menubar ndChild"></div><br />
            <div class="menubar rdChild"></div><br />
            <div class="menubar"></div>
        </div>

        <a id="tools"><span class="tools">Dietary Assessment </span>Tools
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

        @section('userNavigation')

            @if(Auth::check())
                @parent
            @else
                <a href="/login" class="login">Login</a>
                <a href="/register" class="register">Register</a>
            @endif
            @if((Auth::check()) && (Auth::user()->id < 6))
                <a href="/admin-management">Administer</a>
            @endif

        @endsection

    </div>

@endsection

@section('content')

    @if(session()->has('userdel'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            {{session('userdel')}}
        </div>
    @endif

    @if(session()->has('userfail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('userfail')}}</strong>
        </div>
    @endif

    @if(session()->has('postdel'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            {{session('postdel')}}
        </div>
    @endif

    @if(session()->has('postfail'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('postfail')}}</strong>&nbsp;
        </div>
    @endif

    <div id="loginWrapper">

        <h1 class="text-center">Administration Panel</h1><br />

        <div class="container">
            <div class="row">

                <div class="col col-lg-6 col-md-12">
                    <h2 class="text-center">Users</h2>
                    <br />

                    <button class="listUsers" onclick="document.getElementById('listUsers').style.display='block'">List Users</button><br /><br />
                    <div id="listUsers">
                        <div class="card">
                            <div class="card-body">
                                @foreach($users as $user)
                                    @if($user->status)Verified @else NV @endif &nbsp;<strong><a href="/user/{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a></strong>  {{$user->email}} @if($user->provider != null) | {{$user->provider}} @endif &nbsp; <a class="deleteIcon" href="/delete/user/{{base64_encode($user->id)}}"><i class="far fa-trash-alt"></i></a><br />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-6 col-md-12">
                    <h2 class="text-center">Articles</h2>
                    <br />

                    <button class="listArticles" onclick="document.getElementById('listArticles').style.display='block'">List Articles</button><br /><br />
                    <div id="listArticles">
                        <div class="card">
                            <div class="card-body">
                                @foreach($articles as $article)
                                    {{$article->created_at}} &nbsp;<strong><a href="/user/{{$article->user_id}}">{{$article->user->firstname}} {{$article->user->lastname}}</a></strong> &nbsp;<a class="article" href="/blog/{{str_replace(' ','-',$article->title)}}">{{$article->title}}</a> &nbsp; <a class="deleteIcon" href="/delete/user/{{base64_encode($user->id)}}"><i class="far fa-trash-alt"></i></a><br />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

@endsection