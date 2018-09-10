@extends('templates.app2')

@section('title')
    Lishe Pro | My Account
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

    @if(session()->has('userfail'))
        <div class="alert alert-danger alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            {{session('userfail')}}
        </div>
    @endif

    <div class="row">
        <div class="col-9">
            <br />
            <h1 style="margin-left: 5vw;" class="text-center detailsTitle">Account Details</h1>

            <ul class="userList">
                <li class="large">Name: <span class="details">{{$user->firstname}} {{$user->lastname}}</span></li>
                <li class="large">Email Address: <span class="details">{{$user->email}}</span></li>
                <li class="large">Verified: <span class="details">@if($user->status) Verified @else Not verified @endif</span></li>
                <li class="large">Number of articles: <span class="details">{{count($user->article()->get())}}</span></li>
            </ul>
            <br />
            <button style="margin-left: 5vw; border-radius: 3px;" class="createButton" onclick="window.location.href='https://lishep.herokuapp.com/delete-account/{{$user->id}}'">Delete Account</button>

        </div>
    </div>

@endsection