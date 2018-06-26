@extends('templates.application')

@section('title')
    Lishe Pro - Better Health Through Nutrition & Dietary Assesment Tools an Expertise
@endsection

@section('header')
    <span class="logo"><a href="/">Lishe Pro</a></span>
    <div class="nav-links">
        <a id="tools">Tools
            <div class="submenu">
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                <a href="/exercise-calories-burned-calculator">Calories Burned Calculator</a>
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
            </div>
        </a>
        <a onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Diet Assessment</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <a href="/about-us">About Us</a>
    </div>

    <div id="dietassessmentmodal">

        <div class="dietassessment">
            <div id="x">
                <button onclick="document.getElementById('dietassessmentmodal').style.display='none'">&times;</button>
            </div>
            <div id="assessmentForm">
                <h3 class="text-center">Free Diet Assessment</h3>
                <form method="POST" action="/diet-assessment">
                    <label for="height">Height</label>
                    <input name="height" type="text" />

                    <label for="weight">Weight</label>
                    <input name="weight" type="text" />

                    <label for="age">Age</label>
                    <input name="age" type="number" />

                    <label for="sex">Sex</label>
                    <input name="sex" type="radio" value="Female" />
                    <input name="sex" type="radio" value="Male" /><br /><br />

                    <button type="submit">Start Now</button><br /> <br />
                </form>
            </div>
        </div>

    </div>

@endsection

@section('content')
    <div id="homeWrapper">
        <div id="homeIntro">
            <img src="{{'images/bg-large.jpeg'}}"/>
            <div id="intro">
                Better Health Through Nutrition Tools,<br />
                Interactive Dietary Assessment and <br />
                Expertise
            </div>
            <button id="introButton" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Try Our Diet Assessment Tool</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            window.onscroll = function(){
                if(document.body.scrollTop > 2 || document.documentElement.scrollTop > 2){
                    /*$("#header").addClass("scroll20");*/
                } else{
                   /* $("#header").removeClass("scroll20");*/
                }
            };

            $("#tools, .submenu, .submenu a").hover(function() {
                $('.submenu').css('display', 'block');
            }, function(){
                $('.submenu').css('display', 'none');
            });
        });
    </script>
@endsection