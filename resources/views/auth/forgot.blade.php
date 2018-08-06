@extends('templates.application')

@section('title')
    Lishe Pro - Forgot Password
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
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </div>

@endsection

@section('content')

    <div id="loginWrapper">

        <h1 class="text-center">Forgot Your Password ?</h1>

        <div class="col-9 center">
            <form method="POST" action="/forgot" id="loginForm" >
                @csrf

                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
            $(".nav-links a, .logo a").css('color', '#D9DCD8');
        });
    </script>

@endsection