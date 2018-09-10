@extends('templates.application')

@section('title')
    Lishe Pro - Blog
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
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/blog">Blog</a>

        @section('userNavigation')

            @if(Auth::check())
                @parent
            @else
                <a href="/login" class="login">Login</a>
                <a href="/register" class="register">Register</a>
            @endif
            @if((Auth::check()) && (Auth::user()->id < 6))
                <a href="/admin-management">Administer</a>
            @endif

        @endsection

    </div>

@endsection

@section('content')

    @if(session()->has('articlesuccess'))
        <div class="alert alert-success alert-dismissible alert-icon-left border-0">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('articlesuccess')}}</strong>&nbsp;
        </div>
    @endif

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Blog Posts</h2>
        </div>

        <div id="blogSide">

            {{--@if((Auth::check()) && (Auth::user()->id == 4))--}}
            <a class="sideInline" href="/article/create"><button> New Article&nbsp;</button></a>
            {{--@endif--}}<br class="sideDel"/><br class="sideDel"/>

            <h4 class="archToggle sideInline">Archives</h4>
            <div class="archLinks">
                @foreach($archives as $stat)
                    <a class="archLink" href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
                @endforeach
            </div>


        </div>

        <div id="blogBod">

            @foreach($articles as $article)
                <h3><a href="/blog/{{str_replace(' ','-',$article->title)}}">{{$article->title}}</a></h3>
                <span class="articleTime"><b >{{$article->user->firstname}} {{$article->user->lastname}}</b> on {{$article->created_at->toFormattedDateString()}}</span><br /><br />

                <span class="articleBod index">

                    @if(preg_match('/<p><img(.*)>/', $article->body, $images))
                        <a href="/blog/{{str_replace(' ','-',$article->title)}}">{!! $images[0] !!}</a>
                        <span class="readMore"><a href="/blog/{{str_replace(' ','-',$article->title)}}"><i>Read More</i></a></span>
                    @endif

                </span><br />
                <span class="articleTime">
                    <i>
                        @if(count($article->comments)>1)
                            {{count($article->comments)}} comments

                        @elseif(count($article->comments)==1)
                            {{count($article->comments)}} comment

                        @else
                            No comments
                        @endif

                    </i>
                </span>
                <hr/> <br />
            @endforeach

            {{$articles->links()}}
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $(".archToggle, .archLinks").hover(function(){
                $('.archLinks').addClass('display');
            }, function(){
                $('.archLinks').removeClass('display');
            });
        });
    </script>

@endsection