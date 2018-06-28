@extends('templates.application')

@section('title')
    Lishe Pro - Register
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

            <label for="name">Name</label>

            <input id="name" type="text" placeholder="Example: John F. Kennedy" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>


            <label for="email">E-Mail Address</label>

            <input id="email" type="email" placeholder="Something like: example@mymail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            

            <label for="password">Password</label>

            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
            @endif

            <label for="password-confirm">Confirm Password</label>

            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required><br /><br />

            <button type="submit" class="btn">
                Join Us
            </button><br /><br />

            <h4 class="text-center">or register using</h4>

            <button class="btn btn-primary">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>&nbsp;Facebook <span class="account">Account</span>
            </button>

            <button class="btn btn-danger float-right">
                <i class="fab fa-google-plus-g" aria-hidden="true"></i>&nbsp;Google Plus <span class="account">Account</span>
            </button>

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