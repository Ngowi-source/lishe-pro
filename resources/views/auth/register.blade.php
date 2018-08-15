@extends('templates.application')

@section('title')
    Lishe Pro - Register
@endsection

@section('header')
    <span class="logo"><a href="/">Lishe Pro</a></span>
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
    </div>

@endsection

@section('content')

    @if(session()->has('socialerror'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            {{session('socialerror')}}&nbsp;<strong>Please </strong><a href="/login">login</a> or register with a different account.
        </div>
    @endif

    <div id="registerWrapper">

        <h1 class="text-center">Registration</h1>

        <div class="col-6">
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

                <a class="float-left Links" href="/login">
                    Already have an account ?
                </a><br /><br />

            </form>
        </div>

        <div class="br">
            <br /><hr /><br />
        </div>

        <div class="col-6 float-right">
            <h4 class="text-center">or using</h4>
            <br />

            <button class="btn gplus socials" onclick="window.location.href='https://lishep.herokuapp.com/auth/redirect/google'">
                <i class="fab fa-google-plus-g " aria-hidden="true"></i>&nbsp;&nbsp;Google Plus <span class="account">Account</span>
            </button><br /><br />


            <button class="btn fbook socials" onclick="window.location.href='https://lishep.herokuapp.com/auth/redirect/facebook'">
                <i class="fab fa-facebook-f " aria-hidden="true"></i>&nbsp;&nbsp;Facebook <span class="account">Account</span>
            </button><br /><br />

            <button class="btn twitter socials">
                <i class="fab fa-twitter "></i>&nbsp;&nbsp;Twitter <span class="account">Account</span>
            </button>
            <br /><br />
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

@endsection