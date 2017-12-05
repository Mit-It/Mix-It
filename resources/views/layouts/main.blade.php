<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mix-It!</title>

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/flexslider/flexslider.css">
    <script src="https://use.fontawesome.com/3dcf331835.js"></script>
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
    <div class="mi-page">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Mix-It!</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Cocktails</a></li>
                        <li><a href="#">Über uns</a></li>
                        <li><a href="#">Impressum</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <main>
            <div class="flexslider" style="height: 350px;">
                <ul class="slides">
                    <li>
                        <img src="/img/cocktails1.jpg" height="350px">
                    </li>
                    </li>
                    <li>
                        <img src="/img/cocktails5.jpg" height="350px">
                    </li>
                    <li>
                        <img src="/img/cocktails6.jpg" height="350px">
                    </li>
                    <li>
                        <img src="/img/cocktails7.jpg" height="350px">
                    </li>
                    <li>
                        <img src="/img/cocktails8.jpg" height="350px">
                    </li>
                    <li>
                        <img src="/img/cocktails9.jpg" height="350px">
                    </li>
                </ul>
            </div>
            <div class="mi-content container">

            @yield('content')

            </div>
        </main>
    </div>

<script src="/js/app.js"></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="/flexslider/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 900,
            itemHeight: 300,
            itemMargin: 5,
            maxItems: 1
        });
    });
</script>
</body>
</html>