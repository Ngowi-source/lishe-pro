@extends('templates.application')

@section('stylesheets')
    <link rel="stylesheet" href="{{'/css/app.css'}}">
@endsection

@section('title')
    Lishe Pro - Shop
@endsection

@section('header')

    <div class="logo"><a href="/"><img src="https://s3.us-east-2.amazonaws.com/lishepro/logo2.png" alt="LishePro logo"></a></div>
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

    <div id="shopWrapper">

        <div id="shopNav">
            <ul class="navInl">
                <li><a href="#">SUPER FOODS</a></li>
                <li><a href="#">SAMPLE MENUS</a></li>
                <li><a href="#">BOOKS & EBOOKS</a></li>
                <li><a href="#">SUPPLEMENTS</a></li>
            </ul>

            <div class="dropdown navInl">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">SUPER FOODS</a>
                    <a class="dropdown-item" href="#">SAMPLE MENUS</a>
                    <a class="dropdown-item" href="#">BOOKS & EBOOKS</a>
                    <a class="dropdown-item" href="#">SUPPLEMENTS</a>
                </div>
            </div>

            <div id="searchBox" class="navInl">
                <form action="/shop" method="POST">
                    {{csrf_field()}}

                    <input class="input-" type="text" name="search" placeholder="Search..." required>&nbsp;<button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>

        <div id="shopIntro">

        </div>

        <div id="topSellr">

            <h2>Top Sellers</h2>

            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.checkers.com%2Fwp-content%2Fuploads%2F2017%2F04%2FNew-Menu-Items_Featured-Image_1000x1000-600x600.jpg&imgrefurl=https%3A%2F%2Fwww.checkers.com%2Ffood%2F&docid=1nguxhcCnHpyxM&tbnid=n3kzITK6H_aAFM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs..i&w=600&h=600&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.checkers.com%2Fwp-content%2Fuploads%2F2017%2F04%2FNew-Menu-Items_Featured-Image_1000x1000-600x600.jpg&imgrefurl=https%3A%2F%2Fwww.checkers.com%2Ffood%2F&docid=1nguxhcCnHpyxM&tbnid=n3kzITK6H_aAFM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs..i&w=600&h=600&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.checkers.com%2Fwp-content%2Fuploads%2F2017%2F04%2FNew-Menu-Items_Featured-Image_1000x1000-600x600.jpg&imgrefurl=https%3A%2F%2Fwww.checkers.com%2Ffood%2F&docid=1nguxhcCnHpyxM&tbnid=n3kzITK6H_aAFM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs..i&w=600&h=600&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.checkers.com%2Fwp-content%2Fuploads%2F2017%2F04%2FNew-Menu-Items_Featured-Image_1000x1000-600x600.jpg&imgrefurl=https%3A%2F%2Fwww.checkers.com%2Ffood%2F&docid=1nguxhcCnHpyxM&tbnid=n3kzITK6H_aAFM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs..i&w=600&h=600&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwihASgrMCs&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>

        </div>

        <div id="topPicks">

            <h2>Top Picks</h2>

            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fnews.berkeley.edu%2Fwp-content%2Fuploads%2F2013%2F08%2Fhamburgers300.jpg&imgrefurl=https%3A%2F%2Fnews.berkeley.edu%2F2013%2F08%2F06%2Fpoor-sleep-junk-food%2F&docid=zRnbkbCI63BMcM&tbnid=lXSEYYSxxoZSIM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg..i&w=300&h=400&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fnews.berkeley.edu%2Fwp-content%2Fuploads%2F2013%2F08%2Fhamburgers300.jpg&imgrefurl=https%3A%2F%2Fnews.berkeley.edu%2F2013%2F08%2F06%2Fpoor-sleep-junk-food%2F&docid=zRnbkbCI63BMcM&tbnid=lXSEYYSxxoZSIM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg..i&w=300&h=400&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fnews.berkeley.edu%2Fwp-content%2Fuploads%2F2013%2F08%2Fhamburgers300.jpg&imgrefurl=https%3A%2F%2Fnews.berkeley.edu%2F2013%2F08%2F06%2Fpoor-sleep-junk-food%2F&docid=zRnbkbCI63BMcM&tbnid=lXSEYYSxxoZSIM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg..i&w=300&h=400&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card mb-3">
                    <img class="card-img-top" src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fnews.berkeley.edu%2Fwp-content%2Fuploads%2F2013%2F08%2Fhamburgers300.jpg&imgrefurl=https%3A%2F%2Fnews.berkeley.edu%2F2013%2F08%2F06%2Fpoor-sleep-junk-food%2F&docid=zRnbkbCI63BMcM&tbnid=lXSEYYSxxoZSIM%3A&vet=10ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg..i&w=300&h=400&bih=569&biw=1242&q=food&ved=0ahUKEwjsx8Gs2ZrfAhVxu3EKHWfyCPAQMwjQAShYMFg&iact=mrc&uact=8" style="width: 200px;height:300px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Wings</h5>
                        <p class="card-text"><a class="text-muted">Tsh 3999</a></p>
                    </div>
                </div>
            </div>

        </div>

        <div id="shopFoot">

        </div>

    </div>

@endsection

@section('scripts')



@endsection