@extends('templates.application')

@section('title')
    Lishe Pro - Login
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
        <a href="/register">Register</a>
    </div>

@endsection

@section('content')

    <div id="loginWrapper">

        <h1 class="text-center">Log In</h1>

        <form method="POST" action="/login" id="loginForm" >
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

            <input id="email" type="email" placeholder="example@mymail.com" class="form-control" name="email" value="{{ old('email') }}" required autofocus><br />


            <label for="password" class="large">Password</label>

            <input id="password" type="password" class="form-control" name="password" required><br />


            <label class="large">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;Remember Me
            </label><br />

            <button type="submit" class="btn large">
                Log In
            </button><br />

            <a class="float-left" href="/reset">
                Forgot Your Password ?
            </a>

            <a class="float-right" href="/register">
                Don't have an account yet ?
            </a>
            <br />

            <h4 class="text-center">or using</h4>
            <br />

            <button class="btn gplus socials">
                <i class="fab fa-google-plus-g " aria-hidden="true"></i>&nbsp;&nbsp;Google Plus <span class="account">Account</span>
            </button><br /><br />


            <button class="btn fbook socials">
                <i class="fab fa-facebook-f " aria-hidden="true"></i>&nbsp;&nbsp;Facebook <span class="account">Account</span>
            </button><br /><br />

            <button class="btn twitter socials">
                <i class="fab fa-twitter "></i>&nbsp;&nbsp;Twitter <span class="account">Account</span>
            </button>&nbsp;
            <br /><br />

        </form>
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