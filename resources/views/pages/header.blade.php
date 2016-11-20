<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Instrument Review &#8211; One-stop solution for your Instrument needs</title>

    <!-- Bootstrap core CSS
    <link href="/vendor/iron-summit-media/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/iron-summit-media/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
    <style>
        body {
            padding: 75px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default  navbar-inverse1 navbar-fixed-top">
    <div class="container-fluid">
        <div class="row navbar-header navbar-fixed-top">
            <div class="col-xs-2 col-md-2 col-sm-2 col-lg-2">



                <a class="navbar-brand1" href="/">
                    <img alt="Brand" src="/images/logo-2.jpg" height="45px" width="auto">
                </a>
            </div>
            <div class="col-xs-0 col-md-0 col-sm-0 col-lg-0">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-header">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>





            <div class="collapse navbar-collapse navbar-default navbar-inverse1 col-xs-12  col-md-8 col-sm-10 col-lg-10 col-md-offset-0 col-md-push-3" id="collapse-header">
                <ul class="nav navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/questions">Ask an Expert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comparisons">Comparisons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/applicationhelper">Application Helper</a>
                    </li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ url('/login') }}">Login</a></li>

                    @else
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>


        </div>
    </div>
</nav>


@yield('content')


</body>
</html>