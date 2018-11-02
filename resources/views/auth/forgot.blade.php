@extends('templates.application')

@section('title')
    Lishe Pro - Forgot Password
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
                <a href="/weight-loss-tracker">Weight Loss</a>
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                <a href="/online-food-diary">Online Food Diary</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>
            </div>
        </a>
        <a href="/blog">Blog</a>
        <a href="/login" class="login">Login</a>
        <a href="/register" class="register">Register</a>
    </div>

@endsection

@section('content')

    @if(count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="loginWrapper">

        <h1 class="text-center">Forgot Your Password ?</h1>

        <div class="col-9 center">
            <form method="POST" action="/forgot" id="loginForm" >
                @csrf

                <label for="email" class="large">E-Mail Address</label>

                <input id="email" type="email" placeholder="example@mymail.com" class="form-control" name="email" value="{{ old('email') }}" required autofocus><br /><br />

                <button type="submit" class="btn large">
                    Recover Account
                </button><br /><br />

            </form>
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

@endsection