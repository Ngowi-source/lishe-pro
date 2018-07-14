@extends('templates.application')

@section('stylesheets')

    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{'/css/app.css'}}">

@endsection

@section('title')
    Lishe Pro - New Article
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
                <a href="/body-mass-index-calculator">Body Mass Index Calculator</a>
                <a href="/lishe-pro24">Lishe Pro-24</a>
            </div>
        </a>
        <a href="/blog">Blog</a>
        @if(Auth::check())

            <a href="/logout">Logout</a>
            <a class="topname" href="/account/{{Auth::user()->id}}"><i class="far fa-user"></i> {{Auth::user()->firstname}} {{strtoupper(substr(Auth::user()->lastname, 0, 1))}}.</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endif
    </div>

@endsection

@section('content')

    <div id="blogWrapper">

        <div id="blogHead">
            <h2>Create New Article</h2>
        </div>
        <div id="blogSide">

            <h4>Archives</h4>
            @foreach($archives as $stat)
                <a href="/blog/?month={{$stat['month']}}&year={{$stat['year']}}" class="large">{{$stat['monthname'].' '.$stat['year']}}</a><br />
            @endforeach

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
                <textarea id="bodyid" name="body" class="form-control" required></textarea><br />

                <script>

                    CKEDITOR.replace( 'body'/*, {

                        extraPlugins: 'easyimage',
                        removePlugins: 'image',
                        removeDialogTabs: 'link:advanced'
                    }*/ );
                    /*,
                        toolbar: [
                            { name: 'document', items: [ 'Undo', 'Redo' ] },
                            { name: 'styles', items: [ 'Format' ] },
                            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
                            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
                            { name: 'links', items: [ 'Link', 'Unlink' ] },
                            { name: 'insert', items: [ 'EasyImageUpload' ] }
                        ],
                        cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
                        // Note: this is a token endpoint to be used for CKEditor 4 samples only. Images uploaded using this token may be deleted automatically at any moment.
                        // To create your own token URL please visit https://ckeditor.com/ckeditor-cloud-services/.
                        cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
                        easyimage_styles: {
                            gradient1: {
                                group: 'easyimage-gradients',
                                attributes: {
                                    'class': 'easyimage-gradient-1'
                                },
                                label: 'Blue Gradient',
                                icon: 'https://sdk.ckeditor.com/https://sdk.ckeditor.com/samples/assets/easyimage/icons/gradient1.png',
                                iconHiDpi: 'https://sdk.ckeditor.com/https://sdk.ckeditor.com/samples/assets/easyimage/icons/hidpi/gradient1.png'
                            },
                            gradient2: {
                                group: 'easyimage-gradients',
                                attributes: {
                                    'class': 'easyimage-gradient-2'
                                },
                                label: 'Pink Gradient',
                                icon: 'https://sdk.ckeditor.com/https://sdk.ckeditor.com/samples/assets/easyimage/icons/gradient2.png',
                                iconHiDpi: 'https://sdk.ckeditor.com/https://sdk.ckeditor.com/samples/assets/easyimage/icons/hidpi/gradient2.png'
                            },
                            noGradient: {
                                group: 'easyimage-gradients',
                                attributes: {
                                    'class': 'easyimage-no-gradient'
                                },
                                label: 'No Gradient',
                                icon: 'https://sdk.ckeditor.com/https://sdk.ckeditor.com/samples/assets/easyimage/icons/nogradient.png',
                                iconHiDpi: 'https://sdk.ckeditor.com/https://sdk.ckeditor.com/samples/assets/easyimage/icons/hidpi/nogradient.png'
                            }
                        },
                        easyimage_toolbar: [
                            'EasyImageFull',
                            'EasyImageSide',
                            'EasyImageGradient1',
                            'EasyImageGradient2',
                            'EasyImageNoGradient',
                            'EasyImageAlt'
                        ]

                    */

                </script>

                <button type="submit" class="form-control" id="createButton">
                    Post Article
                </button>
            </form>


        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

            $("#header").css('background', 'linear-gradient(#D57030, #9BA747)');
            $(".nav-links a, .logo a").css('color', '#D9DCD8');
            $(".submenu a").css('color', 'grey');

        });
    </script>

@endsection