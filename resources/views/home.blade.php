@extends('templates.application')

@section('title')
    Lishe Pro - Better Health Through Nutrition & Dietary Assesment Tools an Expertise
@endsection

@section('header')
    <span class="logo"><a href="/">Lishe Pro</a></span>
    <div class="nav-links">
        <a href="/diet-assessment">Diet Assessment</a>
        <a href="/tools" id="tools">Tools
            <div class="submenu">
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                <a href="/exercise-calories-burned-calculator">Calories Burned Calculator</a>
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
            </div>
        </a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/about-us">About Us</a>
    </div>
@endsection

@section('content')
    <div id="homeWrapper">
        <div id="homeIntro">
            <img src="{{'images/bg-large.jpeg'}}"/>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            window.onscroll = function(){
                if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
                    $("#header").addClass("scroll20");
                } else{
                    $("#header").removeClass("scroll20");
                }
            };

        });
    </script>
@endsection