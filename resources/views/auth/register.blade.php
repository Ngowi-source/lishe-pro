@extends('templates.application')

@section('title')
    Lishe Pro - Register
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
    </div>

@endsection

@section('content')

    <div id="registerWrapper">

        <h1 class="text-center">Registration</h1>

        <form method="POST" action="/register" id="registerForm" >
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

            <label for="firstname" class="large">First Name</label>
            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus><br />

            <label for="lastname" class="large">Last Name</label>
            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required ><br />

            <label for="email" class="large">E-Mail Address</label>
            <input id="email" type="email" placeholder="example@mymail.com" class="form-control" name="email" value="{{ old('email') }}" required><br />


            <label for="password" class="large">Password</label>
            <input id="password" type="password" class="form-control" name="password" required><br />


            <label for="password-confirm" class="large">Confirm Password</label>
            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required><br /><br />

            <button type="submit" class="btn large">
                Join Us
            </button><br /><br />

            <h4 class="text-center">or register using</h4>

            <button class="btn btn-danger float-left socials">
                <i class="fab fa-google-plus-g fa-2x" aria-hidden="true"></i>&nbsp;{{--Google Plus <span class="account">Account--}}</span>
            </button>&nbsp;&nbsp;

            <button class="btn btn-primary socials">
                <i class="fab fa-facebook-f fa-2x" aria-hidden="true"></i>&nbsp;{{--Facebook <span class="account">Account--}}</span>
            </button>&nbsp;&nbsp;

            <button class="btn twitter socials">
                <i class="fab fa-twitter fa-2x"></i>&nbsp;{{--Twitter <span class="account">Account--}}</span>
            </button>&nbsp;


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