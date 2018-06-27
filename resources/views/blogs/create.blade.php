@extends('templates.application')

@section('title')
    Lishe Pro - New Article
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
        <a href="/blog">Blog</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/about-us">About Us</a>
    </div>

@endsection

@section('content')

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Create New Article</h2>
        </div>
        <div id="blogSide">
            <h4>Archives</h4>
            <a href="/">May 2018</a><br />
            <a href="/">April 2018</a><br />
            <a href="/">March 2018</a><br />
            <a href="/">February 2018</a><br />
            <a href="/">January 2018</a>
        </div>
        <div id="blogBod">

            <form method="POST" action="/blog" id="createForm">
                {{csrf_field()}}

                <label for="title">Title of the article</label>
                <input id="title" name="title" type="text" class="form-control" />

                <label for="body">Body of the article</label>
                <textarea id="body" name="body" type="text" class="form-control"></textarea>

                <button type="submit" class="form-control">
                    Post Article
                </button>
            </form>

        </div>

    </div>

@endsection

@section('scripts')

@endsection