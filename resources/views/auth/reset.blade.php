@extends('templates.app2')

@section('title')
    Lishe Pro - Reset Password
@endsection

@section('header')
    <span class="logo"><a href="/">Lishe <span class="pro">Pro</span></a></span>
    <div class="nav-links">

        <div class="menu">
            <div class="menubar"></div><br />
            <div class="menubar ndChild"></div><br />
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
        <a href="/login" class="login">Login</a>
        <a href="/register" class="register">Register</a>
    </div>

@endsection

@section('content')

    <div id="loginWrapper">

        <h1 class="text-center">Reset Your Password ?</h1><br />

        <p class="col-9 center">
            Welcome back <strong>{{$user->firstname}} {{$user->lastname}}</strong>
        </p><br /><br />

        <div class="col-9 center">
            <form method="POST" action="/reset" id="loginForm" >
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

                <label for="password" class="large">New Password</label>
                <input id="password" type="password" class="form-control" name="password" required><br />


                <label for="password-confirm" class="large">Confirm Password</label>
                <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required><br /><br />

                <button type="submit" class="btn large">
                    Reset Password
                </button><br /><br />

            </form>
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>

@endsection