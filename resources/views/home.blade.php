@extends('templates.application')

@section('title')
    Lishe Pro - Better Health Through Nutrition & Dietary Assesment Tools an Expertise
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
        @if((Auth::check()) && (Auth::user()->id < 6))
            <a href="/admin-management">Administer</a>
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

                    <label for="name">Name</label>
                    <input id="name" type="text" /><br /><br />

                    <label for="height">Height</label>
                    <input id="height" type="number" placeholder="in centimeters..." required/><br /><br />

                    <label for="weight">Weight</label>
                    <input id="weight" type="number" placeholder="in kilograms..." required/><br /><br />

                    <label for="age">Age</label>
                    <input id="age" type="number" required/><br /><br />

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
            <strong class="text-center">{{session('regsuccess')}}</strong>&nbsp; A link is sent to your email, click it to activate your account
        </div>
    @endif

    @if(session()->has('outsuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('outsuccess')}}</strong>&nbsp;
        </div>
    @endif

    @if(session()->has('adminerror'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">Disallowed...</strong>&nbsp;{{session('adminerror')}}
        </div>
    @endif

    <div id="homeWrapper">
        <div id="homeIntro">
            <img src="{{'images/bg2-large.jpeg'}}"/>
            <div id="intro" class="col-8 col-md-8 col-lg-6">
                Better <span class="introline">Health</span> Through <span class="intro2"><i>Nutrition Tools</i></span>, Interactive Dietary <span class="intro">Assessment</span> and Expertise
            </div>
            <button id="introButton" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Try Our Dietary Assessment Tools</button>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path fill="white" stroke="white" stroke-width="0" d="M0,0 C30,-10 30,37 10,40 L10,80 L0,80 Z"></path>
            </svg>
        </div>
        <div id="whoAreWe">
            <h1>Why Lishe Pro?</h1><br />

            <span class="whoAreWe col-9 col-md-6 col-lg-4">
                Lishe Pro is guided by top-notch professionals’ group with purpose to safely support those who are looking to improve their health through nutrition. We do this by using interactive dietary assessment tools, whole food supplements, and most importantly dietary changes. Our aim is to help as many people as possible be healthier and happier without the use of unnecessary drugs or surgery.
            </span>

        </div>
        <div id="whatWeDo">
            <h1>Featured</h1><br />
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
            <h3>Latest Articles From Our Blog</h3><br />

            @for ($i = 0; $i<3; $i++)

                @if(count($articles) > $i)
                    <div class="card border-success">
                        <div class="card-body">
                            <h2><a href="/blog/{{str_replace(' ','-',$articles[$i]->title)}}">{{$articles[$i]->title}}</a></h2>
                            <span class="articleTime">{{$articles[$i]->created_at->toFormattedDateString()}} by <b>{{$articles[$i]->user->firstname}} {{$articles[$i]->user->lastname}}</b> </span><br /><br />

                            <span class="articleBod">@if(strlen(preg_replace('/<p><img(.*)>/', '', $articles[$i]))>115) {!! substr(preg_replace('/<p><img(.*)>/', '', $articles[$i]->body),0,115) !!}... <span class="readMore"><a href="/blog/{{str_replace(' ','-',$articles[$i]->title)}}"><i>Read More</i></a></span> @else{!! preg_replace('/<p><img(.*)>/', '', $articles[$i]->body) !!}@endif</span><br />
                            <span class="articleTime"><i>{{count($articles[$i]->comments)}} comments</i></span>
                        </div>
                    </div>
                @endif

            @endfor

            <br /><br />

            <h6><a href="/blog">More Articles ></a></h6>

        </div>
        <div id="contact">

            <div id="contactUs">

                <h2>Talk to Us</h2><br />
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

        $(document).ready(function(){

            $("#footer").css({
                'background-color': '#D9DCD8',
                'color' : '#8B281F'
            });

        });

    </script>
@endsection