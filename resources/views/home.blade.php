@extends('templates.application')

@section('title')
    Lishe Pro - Better Health Through Nutrition & Dietary Assesment Tools an Expertise
@endsection

@section('header')

    <div class="logo"><a href="/"><img src="{{'/logo2.png'}}" alt="LishePro logo"></a></div>
    <div class="nav-links">

        <div class="menu">
            <div class="menubar"></div><br />
            <div class="menubar ndChild"></div><br />j
            <div class="menubar rdChild"></div><br />
            <div class="menubar"></div>
        </div>

        <a id="tools"><span class="tools">Dietary Assessment </span>Tools
            <div class="submenu">
                <a id="dal" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">Weight Loss Tracker</a>
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                {{--<a href="/online-food-diary">Online Food Diary</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>--}}
            </div>
        </a>
        <a href="/shop">Shop</a>
        <a href="/about-us">About Us</a>

        @if(Auth::check())
            <a id="nots"><i class="notsIcon far fa-bell"></i>@if(count(Auth::user()->unreadNotifications))<sup>{{count(Auth::user()->unreadNotifications)}}</sup>@endif
                <div class="notifications">

                    @if(count(Auth::user()->unreadNotifications))
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            @if(preg_match('/(.*)NewComment/', $notification->type, $match))

                                <a class="list-group-item" href="/blog/{{$notification->data['comment_link']}}?nots={{$notification->id}}">{{$notification->data['commenter']}} commented: {{substr($notification->data['comment'], 0, 7)}}...</a>

                            @endif
                            @if(preg_match('/(.*)NewReply/', $notification->type, $match))

                                <a class="list-group-item" href="/blog/{{$notification->data['reply_link']}}?nots={{$notification->id}}">{{$notification->data['replier']}} replied: {{substr($notification->data['reply'], 0, 7)}}...</a>

                            @endif
                        @endforeach
                    @else
                        <a>You have no notifications</a>
                    @endif
                </div>
            </a>
            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}">
                <i class="far fa-user"></i> {{Auth::user()->firstname}}
            </a>
        @else
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Register</a>
        @endif
        @can('isAdmin')
            <a href="/admin-management">Administer</a>
        @endcan

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

                {{--<h3 class="text-center">Weight Assesser</h3>--}}
                <form method="POST" action="/weight-loss-gain-tracker">
                    {{csrf_field()}}

                    <input type="radio" value="Female" id="female" name="sex"/>
                    <label for="female"><span></span>Female</label>

                    <input type="radio" value="Male" id="male" name="sex"/>
                    <label for="male"><span></span>Male</label>
                    <br /><br />

                    <label for="height">Height</label>
                    <input id="height" name="height" type="number" step="any" placeholder="in centimeters..." required/><br ><br >

                    <label for="weight">Weight</label>
                    <input id="weight" name="weight" type="number" step="any" placeholder="in kilograms..." required/><br ><br >

                    <label for="age">Age</label>
                    <input id="age" name="age" type="number" required/><br ><br >

                    <label for="activity">Physical Activity</label><br>
                    <select id="activity" name="activity">
                        <option value="sedentary">sedentary</option>
                        <option value="lightly active">lightly active</option>
                        <option value="moderately active">moderately active</option>
                        <option value="very active">very active</option>
                        <option value="extra active">extra active</option>
                    </select><br><br>

                    <button type="submit">Start Now</button><br /> <br />
                </form>
            </div>
        </div>

    </div>

@endsection

@section('content')

    <div id="homeWrapper">
        <div id="homeIntro">

            {{--<svg class="intro" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

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

            </svg>--}}
            <span class="heading">Physical fitness starts with what you eat.
            </span>
            <br>

            <span class="body">Take control of your goals, track your weights, calories, breakdown ingredients, and log activities with Lishe PRO.
            </span>


            <button id="introButton" onclick="document.getElementById('dietassessmentmodal').style.display = 'block'">START FOR FREE!</button>

        </div>
        <div id="whoAreWe">
            <h1 class="text-center">Diet Assessment Tools</h1><br />

            <h3 class="text-center">Trying to lose weight, lower your BMI, or live a healthy lifestyle? Our tools will help to hit your goals</h3><br />

            <div class="hometools">

                <div class="weightLossTracker inl1" onclick="window.location.href='/weight-loss-gain-tracker'">
                    <h5>Weight Loss Tracker</h5>

                    If you've lost weight, increased exercising or made any significant changes in your lifestyle through eating and exercise, its time to modify your plan.

                    <br><br><span class="toolicon"><i class="fas fa-weight fa-4x"></i></span>
                    <span class="useNow"><a href="/weight-loss-gain-tracker">Use&nbsp;Tracker</a></span>
                </div>

                <div class="foodDiary inl1" onclick="window.location.href='/online-food-diary'">
                    <h5>Food Diary</h5>

                    If you want to keep a record of your daily food intake and stay on track when trying to lose weight or maintain a healthy weight and activity levels

                    <br><br><span class="toolicon"><i class="far fa-calendar-alt fa-4x"></i></span>
                    <span class="useNow"><a href="/online-food-diary">Use&nbsp;Food&nbsp;Diary</a></span>
                </div>

                <div class="foodCalorieCounter inl2" onclick="window.location.href='/food-calorie-counter'">
                    <h5>Food Calorie Counter</h5>

                    Powered by the Tanzania Food Composition Database, do you want to see nutrition facts such as calories, fat, protein, carbohydrates, fibre and sugars?

                    <br><br><span class="toolicon"><i class="fas fa-calculator fa-4x"></i></span>
                    <span class="useNow"><a href="/food-calorie-counter">Use&nbsp;Calorie&nbsp;Counter</a></span>
                </div>

                <div class="mpActivityPlanner inl2" onclick="window.location.href='/diet-meal-planner'">
                    <h5>Meal & Physical Activity Planner</h5>

                    Do you want to kick-start a healthier lifestyle by planningwhat you’ll eat, what you’ll drink and your physical activity, and monitor your progress?

                    <br><br><span class="toolicon"><i class="far fa-file-alt fa-4x"></i></span>
                    <span class="useNow"><a href="/diet-meal-planner">Use&nbsp;Planner</a></span>
                </div>

            </div>

        </div>
        <div id="whatWeDo">
            <h1>Lishe PRO-Well & Recipes</h1><br />

            <p>
                Get nutritionist-approved recipes and motivational workout tips from Lishe PRO experts. Lishe PRO provides a wellness engaged lifestyle facility. Individuals receive fitness and nutritional assessment and counseling based on their personal goals.
            </p> <br><br>
            
            <span class="raed"><a href="/blog">READ OUR ARTICLES</a></span>
        </div>
        <div id="loseIt">
            <h3>Loose Weight ONCE AND FOR ALL</h3><br />

            <p>
                Get access to basic tracking for free, or go Premium to get a personalized program and serious results. Lishe PRO believes that weight loss can be positive and transforming as its not just about losing weight, but getting the life-saving and life-altering benefits that come with it.
            </p>
            <br />

            <div id="weightLoss">

                <div id="basic">

                    <span class="loseHeader">LOSE&nbsp;IT!&nbsp;Basic</span><br><br>
                    <div class="frame">

                        <ul>
                            <li><i class="fas fa-check"></i>  Calorie Tracking</li>
                            <li><i class="fas fa-check"></i>  Exercise Tracking</li>
                        </ul>

                        <br><span class="getLoseIt"><a href="/basic">GET BASIC, $0/mo</a></span>
                    </div>

                </div>

                <div id="premium">

                    <span class="loseHeader">LOSE IT! Premium</span><br><br>
                    <div class="frame">

                        <ul>
                            <li><i class="fas fa-check"></i>	Calorie Tracking</li>
                            <li><i class="fas fa-check"></i>	Exercise Tracking</li>
                            <li><i class="fas fa-check"></i>	Macronutrient Goal Setting & Tracking</li>
                            <li><i class="fas fa-check"></i>	Nutrition Insight Reporting</li>
                            <li><i class="fas fa-check"></i>	Data Analysis & Recommendations</li>
                            <li><i class="fas fa-check"></i>	Meal Planning</li>
                            <li><i class="fas fa-check"></i>	Meal Plan, Recipe & Workout Library</li>
                            <li><i class="fas fa-check"></i>	Body Fat Percentage and Water Tracking</li>
                        </ul>

                        <br><span class="getLoseIt"><a href="/premium">GET PREMIUM, $5/mo</a></span>

                    </div>

                </div>

            </div>

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
            <br>
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

    <script type="text/javascript">


        let slide_data = [
            {
                'src':'https://images.unsplash.com/photo-1506765336936-bb05e7e06295?ixlib=rb-0.3.5&s=d40582dbbbb66c7e0812854374194c2e&auto=format&fit=crop&w=1050&q=80',
                'title':'Slide 1',
                'copy':'DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT.'
            },
            {
                'src':'https://images.unsplash.com/photo-1496309732348-3627f3f040ee?ixlib=rb-0.3.5&s=4d04f3d5a488db4031d90f5a1fbba42d&auto=format&fit=crop&w=1050&q=80',
                'title':'Slide 2',
                'copy':'DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT.'
            },
            {
                'src':'https://images.unsplash.com/photo-1504271863819-d279190bf871?ixlib=rb-0.3.5&s=7a2b986d405a04b3f9be2e56b2be40dc&auto=format&fit=crop&w=334&q=80',
                'title':'Slide 3',
                'copy':'DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT.'
            },
            {
                'src':'https://images.unsplash.com/photo-1478728073286-db190d3d8ce6?ixlib=rb-0.3.5&s=87131a6b538ed72b25d9e0fc4bf8df5b&auto=format&fit=crop&w=1050&q=80',
                'title':'Slide 4',
                'copy':'DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT.'
            },

        ];
        let slides = [],
            captions = [];

        let autoplay = setInterval(function(){
            nextSlide();
        },5000);
        let container = document.getElementById('container');
        let leftSlider = document.getElementById('left-col');
        // console.log(leftSlider);
        let down_button = document.getElementById('down_button');
        // let caption = document.getElementById('slider-caption');
        // let caption_heading = caption.querySelector('caption-heading');

        down_button.addEventListener('click',function(e){
            e.preventDefault();
            clearInterval(autoplay);
            nextSlide();
            autoplay;
        });

        for (let i = 0; i< slide_data.length; i++){
            let slide = document.createElement('div'),
                caption = document.createElement('div'),
                slide_title = document.createElement('div');

            slide.classList.add('slide');
            slide.setAttribute('style','background:url('+slide_data[i].src+')');
            caption.classList.add('caption');
            slide_title.classList.add('caption-heading');
            slide_title.innerHTML = '<h1>'+slide_data[i].title+'</h1>';

            switch(i){
                case 0:
                    slide.classList.add('current');
                    caption.classList.add('current-caption');
                    break;
                case 1:
                    slide.classList.add('next');
                    caption.classList.add('next-caption');
                    break;
                case slide_data.length -1:
                    slide.classList.add('previous');
                    caption.classList.add('previous-caption');
                    break;
                default:
                    break;
            }
            caption.appendChild(slide_title);
            caption.insertAdjacentHTML('beforeend','<div class="caption-subhead"><span>dolor sit amet, consectetur adipiscing elit. </span></div>');
            slides.push(slide);
            captions.push(caption);
            leftSlider.appendChild(slide);
            container.appendChild(caption);
        }
        // console.log(slides);

        function nextSlide(){
            // caption.classList.add('offscreen');

            slides[0].classList.remove('current');
            slides[0].classList.add('previous','change');
            slides[1].classList.remove('next');
            slides[1].classList.add('current');
            slides[2].classList.add('next');
            let last = slides.length -1;
            slides[last].classList.remove('previous');

            captions[0].classList.remove('current-caption');
            captions[0].classList.add('previous-caption','change');
            captions[1].classList.remove('next-caption');
            captions[1].classList.add('current-caption');
            captions[2].classList.add('next-caption');
            let last_caption = captions.length -1;

            // console.log(last);
            captions[last].classList.remove('previous-caption');

            let placeholder = slides.shift();
            let captions_placeholder = captions.shift();
            slides.push(placeholder);
            captions.push(captions_placeholder);
        }

        let heading = document.querySelector('.caption-heading');


        // https://jonsuh.com/blog/detect-the-end-of-css-animations-and-transitions-with-javascript/
        function whichTransitionEvent(){
            var t,
                el = document.createElement("fakeelement");

            var transitions = {
                "transition"      : "transitionend",
                "OTransition"     : "oTransitionEnd",
                "MozTransition"   : "transitionend",
                "WebkitTransition": "webkitTransitionEnd"
            }

            for (t in transitions){
                if (el.style[t] !== undefined){
                    return transitions[t];
                }
            }
        }

        var transitionEvent = whichTransitionEvent()
        caption.addEventListener(transitionEvent, customFunction);

        function customFunction(event) {
            caption.removeEventListener(transitionEvent, customFunction);
            console.log('animation ended');

            // Do something when the transition ends
        }




    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection