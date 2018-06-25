<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">

    <title>@yield('title')</title>
</head>
<body>

    <div id="contentWrapper">
        <div id="header">@yield('header')</div>

        <div id="content">@yield('content')</div>

        <div id="footer">
            <span class="footer">
                2018&copy;Lishe Pro Tanzania. All Rights Reserved
                Crafted by <a href="http://www.bryceandy.com">BryceAndy</a>
            </span>
        </div>
    </div>

</body>
</html>