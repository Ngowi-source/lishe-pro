@extends('templates.application')

@section('title')
    Lishe Pro - BMR Calculator
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
                <a href="/BMR-calculator">BMR Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/blog">Blog</a>

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
                <i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0,1))}}.
            </a>
        @else
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Register</a>
        @endif
        @can('isAdmin')
            <a href="/admin-management">Administer</a>
        @endcan

    </div>

@endsection

@section('content')

    <div id="bmrWrapper">
        <div id="BMResults">

            @if(isset($bmr))

                <h3 class="text-center">Calculation Results</h3><br />
                <span class="results float-left">The amount of calories required to maintain your current weight is:  </span><span class="bmr">{{$bmr}}</span><br />

                <span class="results2 float-left">If you are sedentary (i.e <i>little /no exercise</i>):  </span><span class="bmr">{{(int)($bmr *1.2)}}</span><br />

                <span class="results float-left">If you are lightly active (i.e <i>light exercise/sports, 1-3days/week</i>):  </span><span class="bmr">{{(int)($bmr *1.375)}}</span><br />

                <span class="results2 float-left">If you are moderately active (i.e <i>moderate exercise/sports, 3-5days/week</i>):  </span><span class="bmr">{{(int)($bmr *1.55)}}</span><br />

                <span class="results float-left">If you are very active (i.e <i>hard exercise/sports, 6-7days/week</i>):  </span><span class="bmr">{{(int)($bmr *1.725)}}</span><br />

                <span class="results2 float-left">If you are extra active (i.e <i>very hard daily exercise/sports,& physical job/2X training</i>):  </span><span class="bmr">{{(int)($bmr *1.9)}}</span><br />

            @endif
        </div>

        <div id="BMRForm">

            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h3 class="text-center">Calculate Your Daily Caloric Needs</h3><br />
            <form method="POST" action="/BMR-calculator">
                {{csrf_field()}}

                <label for="name">Name</label>
                <input id="name" type="text" name="name" /><br /><br />

                <label for="height">Height</label>
                <input id="height" name="height" type="number" placeholder="in centimeters..." required/><br /><br />

                <label for="weight">Weight</label>
                <input id="weight" name="weight" type="number" placeholder="in kilograms..." required/><br /><br />

                <label for="age">Age</label>
                <input id="age" name="age" type="number" required/><br /><br />

                <input type="radio" value="Female" id="female" name="sex"/>
                <label for="female"><span></span>Female</label>

                <input type="radio" value="Male" id="male" name="sex"/>
                <label for="male"><span></span>Male</label>
                <br /><br />

                <button type="submit">Calculate</button><br /> <br />
            </form>
        </div>
    </div>

@endsection
