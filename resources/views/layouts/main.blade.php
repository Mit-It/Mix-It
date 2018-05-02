<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mix-It!</title>


    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" >
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/flexslider/flexslider.css">
    <script src="https://use.fontawesome.com/3dcf331835.js"></script>
    <link href="/css/main.css" rel="stylesheet">
    @yield('header')
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
                    <a class="navbar-brand" href="#"><img src="{{ asset('/img/logo.png') }}" height="60px"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="/cocktails">Cocktails</a></li>
                        <li><a href="/aboutus">Über uns</a></li>
                        <li><a href="#">Impressum</a></li>
                        @if (Auth::check())
                            <li><a href="/recipebooks">Meine Rezeptbücher</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li><a href="/logout">Logout</a></li>
                        @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Registrieren</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <main>
            <div class="mi-content">
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
@yield('bodyEnd')
</body>
</html>
