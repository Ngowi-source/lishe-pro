@extends('templates.application')

@section('title')
    Lishe Pro - Blog
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
            </div>
        </a>
        <a href="/lishe-pro-well-and-Recipes">Lishe PRO-Well and Recipes</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/about-us">About Us</a>
    </div>

@endsection

@section('content')

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Our Articles</h2>
        </div>
        <div id="blogSide">
            <h4>Archives</h4>
            <a href="/">May 2018</a><br />
            <a href="/">April 2018</a><br />
            <a href="/">March 2018</a><br />
            <a href="/">February 2018</a><br />
            <a href="/">January 2018</a>
        </div>
        <div id="blogBod"></div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#header").css('background-color', '#D9DCD8')
        });
    </script>

@endsection