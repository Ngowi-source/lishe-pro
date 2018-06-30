@extends('templates.application')

@section('title')
    Lishe Pro - Better Health Through Nutrition & Dietary Assesment Tools an Expertise
@endsection

@section('header')

    <span class="logo"><a href="/">Lishe Pro</a></span>
    <div class="nav-links">
        <a id="tools">Dietary Assessment Tools
            <div class="submenu">
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                <a href="/weight-loss-tracker">Weight Loss Tracker</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>
                <a href="/online-food-diary">Online Food Diary</a>
                <a id="dal" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Body Mass Index Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/blog">Blog</a>
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0,1))}}.</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endif
    </div>

    <div id="dietassessmentmodal">

        <div class="dietassessment">
            <div id="x">
                <button onclick="document.getElementById('dietassessmentmodal').style.display='none'">&times;</button>
            </div>
            <div id="assessmentForm">

                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
    @if(session()->has('regsuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong>{{session('regsuccess')}}</strong>
        </div>
    @endif

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
            <h3>Latest Article From Our Blog</h3><br />

            @if(count($articles))
                <h2><a href="/blog/{{$articles[0]->id}}">{{$articles[0]->title}}</a></h2>
                <span class="articleTime">{{$articles[0]->created_at->toFormattedDateString()}}</span><br /><br />

                <span class="articleBod">@if(strlen($articles[0])>400){{substr($articles[0]->body,0,400)}}... <span class="readMore"><a href="/blog/{{$articles[0]->id}}"><i>Read More</i></a></span> @else{{$articles[0]->body}}@endif</span><br />
                <span class="articleTime"><b>{{$articles[0]->user->firstname}} {{$articles[0]->user->lastname}}</b>&nbsp;&nbsp;&nbsp;<i>{{count($articles[0]->comments)}} comments</i></span>
                <br /><br />

                <h4><a href="/blog">More Articles >></a></h4>
            @endif

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