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
                <a href="/weight-loss-tracker">Weight Loss Tracker</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>
                <a href="/online-food-diary">Online Food Diary</a>
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
            </div>
        </a>
        <a id="dal" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Diet Assessment</a>
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
                <h3 class="text-center">Free Diet Assessment Tool</h3>
                <form method="POST" action="/diet-assessment">
                    <label for="height">Height</label>
                    <input id="height" type="text" />

                    <label for="weight">Weight</label>
                    <input id="weight" type="text" />

                    <label for="age">Age</label>
                    <input id="age" type="number" /><br />

                    <input type="radio" value="Female" id="female" name="sex"/>
                    <label for="female"><span></span>Female</label>

                    <input type="radio" value="Male" id="male" name="sex"/>
                    <label for="male"><span></span>Male</label>
                    <br /><br />


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
        <div id="whoAreWe">
            <h1>Why Lishe Pro?</h1>

            <span class="whoAreWe">Lishe PRO is guided by top-notch professionals’ group with purpose to safely <br />
            support those who are looking to improve their health through nutrition. <br />
            We do this by using interactive dietary assessment tools, whole food supplements,<br />
            and most importantly dietary changes. Our aim is to help as many people as <br />
                possible be healthier and happier without the use of unnecessary drugs or surgery.</span>

        </div>
        <div id="whatWeDo">
            <h1>Featured</h1>
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