@extends('templates.application')

@section('title')
    Lishe Pro - Better Health Through Nutrition & Dietary Assesment Tools an Expertise
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
                <a id="dal" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Body Mass Index Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/blog">Blog</a>
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0,1))}}.</a>
        @else
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Register</a>
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

                <h3 class="text-center">Free Diet Assesser</h3>
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
                    <br />

                    <button type="submit">Start Now</button><br /> <br />
                </form>
            </div>
        </div>

    </div>

@endsection

@section('content')

    @if(session()->has('regsuccess'))
        <div class="alert alertr alertwlcm alert-success alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('regsuccess')}}</strong>&nbsp; A link is sent to your email, click it to activate your account
        </div>
    @endif

    @if(session()->has('loginsuccess'))
        <div class="alert alert-success alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <span class="text-center">{{session('loginsuccess')}} {{Auth::user()->firstname}}</span>&nbsp;
        </div>
    @endif

    @if(session()->has('userdel'))
        <div class="alert alert-success alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <span class="text-center">{{session('userdel')}}</span>&nbsp;
        </div>
    @endif

    @if(session()->has('outsuccess'))
        <div class="alert alert-success alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('outsuccess')}}</strong>&nbsp;
        </div>
    @endif

    @if(session()->has('adminerror'))
        <div class="alert alert-danger alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">Disallowed...</strong>&nbsp;{{session('adminerror')}}
        </div>
    @endif

    <div id="homeWrapper">
        <div id="homeIntro">

            <svg class="intro" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                <defs>
                    <linearGradient id="linear" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#d57030" stop-opacity="0.5" />
                        <stop offset="100%" stop-color="#9ba747" stop-opacity="1" />
                    </linearGradient>
                </defs>

                <text x="0" y="15" id="intro1" width="60%" >
                    BETTER HEALTH BY
                </text>
                <text x="0" y="30" id="intro2" width="70%" stroke="url(#linear)" fill="#D9DCD8" >
                    NUTRITION TOOLS,
                </text>
                <text x="0" y="45" id="intro3" width="80%" stroke="url(#linear)" fill="#D9DCD8" >
                    Dietary Assessment
                </text>
                <text x="0" y="60" class="and" >
                    and
                </text>
                <text x="25" y="60" id="intro4" stroke="url(#linear)" fill="#D9DCD8" >
                    EXPERTISE
                </text>

            </svg>

            <button id="introButton" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Try Our Dietary Assessment Tools</button>

        </div>
        <div id="whoAreWe">
            <h1>Why Lishe Pro?</h1><br />

            <span class="whoAreWe text-center col-sm-10 col-md-6 col-lg-4">
                Lishe Pro is guided by top-notch professionals’ group with the purpose to safely support those who are looking to improve their health through nutrition. We do this by using interactive dietary assessment tools, whole food supplements, and most importantly dietary changes. Our aim is to help as many people as possible be healthier and happier without the use of unnecessary drugs or surgery.
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
                    <div class="artNumb numb">0{{$i +1}}</div>
                    <div class="card border-success numb">
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

    </script>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        particlesJS.load('homeIntro', '/particles.json', function(){
            console.log('Particles Loaded');
        });
    </script>
    <script>
        particlesJS.load('homeIntro', '/particles2.json', function(){
            console.log('Particles2 Loaded');
        });
    </script>
    <script>
        particlesJS.load('homeIntro', '/particles3.json', function(){
            console.log('Particles3 Loaded');
        });
    </script>
    <script>
        particlesJS.load('homeIntro', '/particles4.json', function(){
            console.log('Particles4 Loaded');
        });
    </script>
    <script>
        particlesJS.load('homeIntro', '/particles5.json', function(){
            console.log('Particles5 Loaded');
        });
    </script>
    <script>
        particlesJS.load('homeIntro', '/particles6.json', function(){
            console.log('Particles6 Loaded');
        });
    </script>

@endsection