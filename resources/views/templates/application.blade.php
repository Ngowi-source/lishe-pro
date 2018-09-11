<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <link rel="stylesheet" href="{{'css/app.css'}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />


    {{--<script src="{{'js/app.js'}}"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>

    <script src="{{'js/main.js'}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>


    @yield('stylesheets')
    <title>@yield('title')</title>
</head>
<body>

    <div id="contentWrapper">
        <div id="header">
            @yield('header')
            <svg class="head" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#8B281F" stroke="#8B281F" points="0,100 25,100 35,0 0,0 "/>
            </svg>
        </div>

        <div id="content">@yield('content')</div>

        <div id="footer">
            <div class="text-center privacy"><br />
                <a href="/privacy">Privacy Policy</a>&nbsp;|&nbsp;<a href="/terms-of-service">Terms of Service</a>
            </div><br /><br />
            <div class="footer">
                <span class="footblock">2018 &copy;Lishe Pro Tanzania</span>
                <span class="footblock">Crafted by <a href="http://www.bryceandy.com">BryceAndy</a></span>
            </div>
        </div>
    </div>

    {{--bootstrap js--}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TimelineMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @yield('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

            $("#tools, .submenu").hover(function() {
                $('.submenu').addClass('display');
            }, function(){
                $('.submenu').removeClass('display');
            });

            $("#nots, .notifications").hover(function() {
                $('.notifications').addClass('display');
            }, function(){
                $('.notifications').removeClass('display');
            });

            $("#tools").click(function(){
                $(".submenu").toggleClass('display');
            });

            $("#nots").click(function(){
                $(".notifications").toggleClass('display');
            });

            $(".menu").click(function(){
                $(".nav-links").toggleClass('showMenu');
            });

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });
    </script>

    <script src="{{'js/main.js'}}"></script>
</body>
</html>