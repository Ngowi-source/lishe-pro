<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{'css/app.css'}}">

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <title>@yield('title')</title>
</head>
<body>

    <div id="contentWrapper">
        <div id="header">@yield('header')</div>

        <div id="content">@yield('content')</div>

        <div id="footer">
            <div class="footer">
                2018&copy;Lishe Pro Tanzania. All Rights Reserved<br />
                Crafted by <a href="http://www.bryceandy.com">BryceAndy</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TimelineMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @yield('scripts')
    <script type="text/javascript" src="{{'js/main.js'}}"></script>
</body>
</html>