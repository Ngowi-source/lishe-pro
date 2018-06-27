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
        <a href="/lishe-pro-well-and-Recipes">Lishe PRO-Well and Recipes</a>
        <a href="/blog">Blog</a>
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

                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

                <h3 class="text-center">Free Diet Assessment Tool</h3>
                <form method="POST" action="/diet-assessment">
                    {{csrf_field()}}

                    <label for="height">Height</label>
                    <input id="height" type="number" placeholder="in centimeters..." required/>

                    <label for="weight">Weight</label>
                    <input id="weight" type="number" placeholder="in kilograms..." required/>

                    <label for="age">Age</label>
                    <input id="age" type="number" required/><br />

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
            <button id="introButton" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Try Our Dietary Assessment Tools</button>
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
            <div id="fcc">
                <i class="fas fa-calculator fa-5x"></i><br /><br />
                <span class="iconfeatured">Food Calorie Calculator</span>
            </div>
            <div id="wlt">
                <i class="fas fa-weight fa-5x"></i><br /><br />
                <span class="iconfeatured">Weight Loss Tracker</span>
            </div>
            <div id="dmp">
                <i class="fas fa-utensils fa-5x"></i><br /><br />
                <span class="iconfeatured">Diet Meal Planner</span>
            </div>
            <div id="ofd">
                <i class="far fa-address-book fa-5x"></i><br /><br />
                <span class="iconfeatured">Online Food Diary</span>
            </div>
            <div id="bmi">
                <i class="fas fa-male fa-5x"></i><br /><br />
                <span class="iconfeatured">Diet Assessment & Body Mass Index</span>
            </div>
        </div>
        <div id="blog">
            <h3>Latest Article From Our Blog</h3>

        </div>
        <div id="contact">

            <div id="contactUs">

                <h2>Contact Us</h2><br />
                <span class="contactUs">
                    Lishe Pro<br />
                    Kijitonyama Mabatini, PLOT NO. 755, BLOCK 47<br />
                    Dar Es Salaam.<br />
                    <i class="far fa-envelope-open"></i>&nbsp;info@lishepro.co.tz<br />
                    <i class="fas fa-phone"></i>&nbsp; +255 767 423 804
                </span>
            </div>
            <div id="contactMap">

            </div>

        </div>
    </div>
@endsection

@section('scripts')

    <script>

        var mymap = L.map('contactMap', {
            center: [-6.781610, 39.234919],
            scrollWheelZoom: false,
            zoom: 17
        });
        var tiles = new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mymap);

        var marker = L.marker([-6.781610, 39.234919]).addTo(mymap);
        marker.bindPopup("Lishe Pro").openPopup();

    </script>
@endsection