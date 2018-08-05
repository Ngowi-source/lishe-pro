@extends('templates.application')

@section('title')
    Lishe Pro - Administration
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
        <a href="/login">Logout</a>
        <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0, 1))}}.</a>
    </div>

@endsection

@section('content')

    <div id="loginWrapper">

        <h1 class="text-center">Administration Panel</h1>

        <div class="container">
            <div class="row">

                <div class="col">
                    <h2>Users</h2>
                    <br />

                    <button class="listUsers" onclick="document.getElementById('listUsers').style.display='block'">List Users</button><br />
                    <div id="listUsers">
                        <div class="card">
                            <div class="card-body">
                                @foreach($users as $user)
                                    {{$user->email}} | {{$user->firstname}} |
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h2>Articles</h2>
                    <br />

                    <button class="listArticles" onclick="document.getElementById('listArticles').style.display='block'">List Articles</button><br />
                    <div id="listArticles">
                        <div class="card">
                            <div class="card-body">
                                @foreach($articles as $article)
                                    {{$article->user->firstname}} | {{$article->title}} |
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h2>Tools</h2>
                </div>

                <div class="col">
                    <h2>Products</h2>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $(".nav-links a, .logo a").css('color', '#D9DCD8');
        });
    </script>

@endsection