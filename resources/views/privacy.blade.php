@extends('templates.application')

@section('title')
    Lishe Pro - Privacy Policy
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

    <div id="loginWrapper">

        <h1 class="text-center">Privacy Policy</h1>

        <div class="col-12">
            Lishe Pro respects the privacy rights of our users and is strongly committed to protecting your privacy.
            This Privacy Policy applies to this website, information collected and provided to Lishe Pro when you
            are registered to Lishe-Pro.co.tz or at third-party websites and applications.<br /><br />

            <h3>Collection and Use of Your Personal Information</h3>

            This website makes use of a login and registration functionality partly based on popular social accounts
            such as Google Plus, Facebook and Twitter. Lishe Pro may only store user information such as the user names
            used on these social accounts, email addresses and IDs.<br />

            The information collected will only be used for login and registration purposes and nothing more. In no way
            will Lishe Pro publish, use the content posted by the user, or make a post on behalf of the users. Lishe Pro
            will not keep track of any other detail of the user other than collection the basic profile information
            aforementioned.<br /><br />

            <h3>Modification to This Privacy Policy</h3>

            Lishe Pro reserves the right to change this Privacy Policy at any time by posting revisions on this Web
            page. Such changes will be effective upon posting.<br /><br />
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

@endsection