<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">


    <title>Instrument Review &#8211; One-stop solution for your Instrument needs</title>

    <!-- Bootstrap core CSS
    <link href="/vendor/iron-summit-media/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/iron-summit-media/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
   {{-- <link href="/css/carousel.css" rel="stylesheet">--}}
    <style>
        body {
            padding: 75px;
            min-height: 100%;
            box-sizing: border-box;
            background-color: lightgrey;
        }
        @media (max-width: 992px) {.full-width {
            width:100vw;
            margin-left: -50vw;
            left:50%;
            position: relative;

        }}
    </style>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88270812-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>

<nav class="navbar navbar-default1  navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        {{--<div class="row navbar-header navbar-fixed-top">
            <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3">--}}

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-header">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                <a class="navbar-brand" href="/" style="color: #ffffff">
                   <p>INSTREVIEW</p>
                    {{--<img alt="Brand" src="/images/logo-2.jpg" height="45px" width="auto">--}}
                </a>
            {{--</div>
            <div class="col-xs-0 col-md-0 col-sm-0 col-lg-0">--}}

            </div>





            <div class="collapse navbar-collapse navbar-default1 navbar-inverse" id="collapse-header">
                <ul class="nav navbar-nav navbar-right" >
                    <li>
                        <a href="/" style="color: #ffffff">Home</a>
                    </li>
                    <li >
                        <a  href="/reviews" style="color: #ffffff">Reviews</a>
                    </li>
                    <li >
                        <a  href="/questions" style="color: #ffffff">Expert Corner</a>
                    </li>
                    <li >
                        <a  href="/comparisons" style="color: #ffffff">Comparisons</a>
                    </li>
                    <li >
                        <a  href="/applicationassistant" style="color: #ffffff">Application Assistant</a>
                    </li>
                    <li >
                        <a  href="/about" style="color: #ffffff">What are we?</a>
                    </li>
                    {{--<li >
                        <a  href="/knowledgebase" style="color: #ffffff">Knowledge Base</a>
                    </li>--}}

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li ><a href="{{ url('/login') }}" style="color: #ffffff">Login</a></li>

                    @else
                        <li class="dropdown  ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #ffffff">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu navbar-inverse" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" style="color: #ffffff">
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