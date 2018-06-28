@extends('templates.application')

@section('title')
    Lishe Pro - Login
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
        <a href="/register">Register</a>
    </div>

@endsection

@section('content')

    <div id="loginWrapper">

        <h1 class="text-center">Log In</h1>

        <form method="POST" action="/login" id="loginForm" >
            @csrf

            <label for="email">E-Mail Address</label>

            <input id="email" type="email" placeholder="Something like: example@mymail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
            @endif

            <label for="password">Password</label>

            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
            @endif

            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;Remember Me
            </label><br /><br />

            <button type="submit" class="btn">
                Lets Go
            </button><br /><br />

            <h4 class="text-center">or login using</h4>

            <button class="btn btn-primary">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>&nbsp;Facebook <span class="account">Account</span>
            </button>

            <button class="btn btn-danger float-right">
                <i class="fab fa-google-plus-g" aria-hidden="true"></i>&nbsp;Google Plus <span class="account">Account</span>
            </button><br /><br />

            <a class="btn btn-link" href="{{ route('auth.reset') }}">
                Forgot Your Password?
            </a>

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