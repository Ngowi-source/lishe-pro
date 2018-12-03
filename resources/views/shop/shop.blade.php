@extends('templates.application')

@section('stylesheets')
    <link rel="stylesheet" href="{{'/css/app.css'}}">
@endsection

@section('title')
    Lishe Pro - Shop
@endsection

@section('header')

    <div class="logo"><a href="/"><img src="{{'/logo2.png'}}" alt="LishePro logo"></a></div>
    <div class="nav-links">

        <div class="menu">
            <div class="menubar"></div><br />
            <div class="menubar ndChild"></div><br />
            <div class="menubar rdChild"></div><br />
            <div class="menubar"></div>
        </div>

        <a id="tools"><span class="tools">Dietary Assessment </span>Tools
            <div class="submenu">
                <a href="/weight-loss-gain-tracker">Weight Loss Tracker</a>
                <a href="/food-calorie-counter">Food Calorie Counter</a>
                {{--<a href="/online-food-diary">Online Food Diary</a>
                <a href="/diet-meal-planner">Diet Meal Planner</a>--}}
            </div>
        </a>
        <a href="/blog">Blog</a>
        <a href="/shop" class="shopLink">Shop</a>
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

@endsection

@section('content')

    <div id="showWrapper">

        <div id="blogHead">
            <br><br><h1 class="text-center">Lishe Store</h1><br><br><br>
        </div>
        <div id="blogHeadSide">


        </div>
        <div id="blogSide">



        </div>
        <div id="blogBod">

            <br><br>
            <img src="https://store.eatingfree.com/images/banner-samples-menus.jpg" alt="Store Home" style="width: 100%;height: auto;">
            <br><br>

            <h3 class="text-center">Top Sellers</h3><br>

            <img class="sellInl" src="https://store.eatingfree.com/files/2013/11/13_22824-thumb.jpg" alt="top 1" style="height: 150px; width: auto;">
            <img class="sellInl" src="https://store.eatingfree.com/files/2015/10/19_15203-thumb.jpg" alt="top 2" style="height: 150px; width: auto;">
            <img class="sellInl" src="https://store.eatingfree.com/files/2013/11/13_16572-thumb.jpg" alt="top 3" style="height: 150px; width: auto;">
            <img class="sellInl" src="https://store.eatingfree.com/files/2016/04/14_20590-thumb.jpg" alt="top 4" style="height: 150px; width: auto;"><br><br>

            <h3 class="text-center">Top Pics</h3><br>

            <img class="sellInline" src="https://store.eatingfree.com/files/2016/09/22_32623-thumb.jpg" alt="top 1" style="height: 150px; width: auto;">
            <img class="sellInline" src="https://store.eatingfree.com/files/2015/12/14_29753-thumb.jpg" alt="top 2" style="height: 150px; width: auto;">
            <img class="sellInline" src="https://store.eatingfree.com/files/2015/12/08_26708-thumb.jpg" alt="top 3" style="height: 150px; width: auto;">
            <img class="sellInline" src="https://store.eatingfree.com/files/2013/11/21_6617-thumb.jpg" alt="top 4" style="height: 150px; width: auto;"><br><br>


            <img src="https://store.eatingfree.com/images/youth-h2o.jpg" alt="ad" style="width:100%; height:auto;"><br><br>

        </div>

    </div>

@endsection

@section('scripts')



@endsection