@extends('templates.application')

@section('stylesheets')

    <link rel="stylesheet" href="{{'/css/app.css'}}">

@endsection

@section('title')
    Lishe Pro - New Article
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

        @if(Auth::check())
            <a id="nots"><i class="notsIcon far fa-bell"></i>
                <div class="notifications">
                    @if(count(Auth::user()->unreadNotifications))
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            @if(preg_match('/(.*)NewComment/', $notification->type, $match))

                                <a class="list-group_item" href="/blog/{{$notification->data['comment_link']}}">{{$notification->data['commenter']}} commented: {{substr($notification->data['comment'], 0, 7)}}...</a>

                            @endif
                            @if(preg_match('/(.*)NewReply/', $notification->type, $match))

                                <a class="list-group-item" href="/blog/{{$notification->data['reply_link']}}">{{$notification->data['replier']}} replied: {{substr($notification->data['reply'], 0, 7)}}...</a>

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
        @if((Auth::check()) && (Auth::user()->id < 6))
            <a href="/admin-management">Administer</a>
        @endif

    </div>

@endsection

@section('content')

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Create New Article</h2>
        </div>
        <div id="blogSide">

            <h4 class="archToggle sideInline">Archives</h4>
            <div class="archLinks">
                @foreach($archives as $stat)
                    <a class="archLink" href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
                @endforeach
            </div>

        </div>
        <div id="blogBod">

            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/articles" id="createForm">
                {{csrf_field()}}

                <label for="title">Title</label>
                <input id="title" name="title" type="text" class="form-control" required/><br />

                <label for="bodyid">Body</label>
                <textarea id="bodyid" name="body" class="form-control" ></textarea><br />

                <button type="submit" class="form-control createButton" id="createButton">
                    Post Article
                </button>
            </form>


        </div>

    </div>

@endsection

@section('scripts')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js{{--?apiKey=your_API_key--}}"></script>
    <script>

        var editor_config = {
            selector:'textarea',
            menubar: false,
            plugins: 'lists image link',
            toolbar: 'formatselect | bold italic strikethrough | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            path_absolute: "/",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win){
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name ;
                if (type == 'image'){
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x*0.8,
                    height: y*0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);

    </script>

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