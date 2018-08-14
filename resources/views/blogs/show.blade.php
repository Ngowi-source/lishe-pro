@extends('templates.application')

@section('stylesheets')
    <link rel="stylesheet" href="{{'/css/app.css'}}">
@endsection

@section('title')
    Lishe Pro - Article
@endsection

@section('header')

    <span class="logo"><a href="/">Lishe Pro</a></span>
    <div class="nav-links">

        <div class="menu">
            <div class="menubar"></div><br />
            <div class="menubar ndChild"></div><br />
            <div class="menubar"></div>
        </div>

        <a id="tools">Dietary Assessment Tools
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
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0, 1))}}.</a>
        @else
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Register</a>
        @endif
    </div>

@endsection

@section('content')

    @if(session()->has('commentsuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('commentsuccess')}}</strong>&nbsp;
        </div>
    @endif

    @if(session()->has('replysuccess'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&Cross;</button>
            <strong class="text-center">{{session('replysuccess')}}</strong>&nbsp;
        </div>
    @endif


    <div><br />

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_inline_share_toolbox_wkp7"></div>

    </div>


    <div id="showWrapper">

        <div id="blogHead">

        </div>
        <div id="blogHeadSide">
            {{--@if((Auth::check()) && (Auth::user()->id == 4))--}}
            <a class="sideInline" href="/article/create"><button>New Article&nbsp; <i class="fas fa-plus"></i>&nbsp;</button></a>
            {{--@endif--}}<br class="sideDel"/><br class="sideDel"/>

            <h4 class="archToggle sideInline">Archives</h4>
            <div class="archLinks">
                @foreach($archives as $stat)
                    <a class="archLink" href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
                @endforeach
            </div>
        </div>
        <div id="blogSide">

            <div class="card w-100 border-success writer">

                <img class="card-img-top" src="https://c5.rgstatic.net/m/437738464651637/images/template/default/profile/profile_default_l.jpg" alt="Sauli Epimack">
                <div class="card-body">
                    <h5 class="card-title">Sauli John Epimack, MS</h5>
                    <p class="card-text">
                        Research Scientist<br />
                        <span class="text-muted">Ifakara Health Institute</span>
                    </p>
                </div>
            </div>
            <br class="sideDel"/>

            {{--@if((Auth::check()) && (Auth::user()->id == 4))--}}
            <a href="/article/create"><button>New Article&nbsp; <i class="fas fa-plus"></i>&nbsp;</button></a>
            <br /><br />
            {{--@endif--}}

            <h4>Archives</h4>
            @foreach($archives as $stat)
                <a href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
            @endforeach

        </div>
        <div id="blogBod">

            <h1>{{$posted->title}}</h1>
            <span class="articleTime"><b>{{$posted->user->firstname}} {{$posted->user->lastname}}</b> on {{$posted->created_at->toFormattedDateString()}}</span><br /><br />

            <span class="articleBod">{!! $posted->body !!}</span><br /><br />

            <div class="card w-75" id="blogWriter">
                <div class="card-body">
                    <h5 class="card-title">Sauli Epimack John, MS</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Research Scientist</h6>
                    <p class="card-text">Sauli is a researcher st the Ifakara University College of Health and Allied Sciences.</p>
                </div>
            </div>

            <br />
            <hr/>

            {{--<h3 class="text-center">Comments</h3>--}}

            <div id="comments">

                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/blog/{{str_replace(' ','-',$posted->title)}}/comment" method="POST" id="addComment">
                    {{csrf_field()}}
                    <h4>Say something about this article</h4>
                    <label for="newcomment"></label>

                    <textarea id="newcomment" type="text" class="form-control" name="body" placeholder="Login or register to comment" required></textarea>
                    <br />
                    <button type="submit" name="send" class="float-right">Add Comment</button>

                </form><br /><br />

                @if(count($posted->comments))

                    <ul class="list-group">
                    @foreach($posted->comments as $comment)

                        <li class="list-group-item">
                            <b class="text-left">{{$comment->user->firstname}} {{$comment->user->lastname}}</b>&nbsp;<span class="grey right"><i>{{$comment->created_at->diffForHumans()}}</i></span><br /><br />

                            <span class="medium">{{$comment->body}}</span><br />

                            <span class="right reply" data-toggle="tooltip" title="Reply" data-id="{{$comment->id}}"><i class="fas fa-reply"></i></span>

                        </li>

                        @if(count($comment->replies))

                                <ul class="list-group replies">
                                    @foreach($comment->replies as $reply)

                                        <li class="list-group-item">
                                            <b class="text-left">{{$reply->user->firstname}} {{$reply->user->lastname}}</b>&nbsp;&nbsp;<span class="grey"><i>replied</i></span>&nbsp;<span class="grey right"><i>{{$reply->created_at->diffForHumans()}}</i></span><br /><br />

                                            {{$reply->body}}<br />
                                        </li>
                                    @endforeach
                                </ul>
                        @endif

                            <form id="reply_{{$comment->id}}" class="commentReplyForm" method="POST" action="/blog/{{str_replace(' ','-',$posted->title)}}/reply">
                                {{csrf_field()}}

                                <label for="newreply" ></label>

                                <textarea id="newreply" type="text" class="form-control" name="body" placeholder="Your reply" required></textarea>
                                <br />

                                <input type="hidden" value="{{$comment->id}}" name="cid" />

                                <button type="submit" name="send" class="float-right">Reply</button><br />
                            </form>

                        <hr />
                    @endforeach
                    </ul>

                @endif


            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

            $(".reply").click(function(){
                $id = $(this).data("id");

                $("#reply_"+$id).css('display', 'block');
            });

            $(".archToggle, .archLinks").hover(function(){
                $('.archLinks').addClass('display');
            }, function(){
                $('.archLinks').removeClass('display');
            });
        });
    </script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b6ac1793196d3fc"></script>


@endsection