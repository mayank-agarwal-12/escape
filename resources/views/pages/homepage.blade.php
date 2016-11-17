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

    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default   navbar-inverse navbar-fixed-top" >
    <div class="container-fluid">
        <div class="row navbar-header navbar-fixed-top">
            <div class="col-xs-12 col-md-2 col-sm-12 col-lg-2">



            <a class="navbar-brand1" href="/">
                <img alt="Brand" src="/images/logo-2.jpg" height="45px" width="130px">
            </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-header">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>


 {{--       <div class="collapse navbar-collapse " id="collapse-header">
            <ul class="nav navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/disclaimer">T&C</a>
                </li>
                    <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a href="{{ url('/register') }}">Register</a></li>
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
        </div><!-- /.navbar-collapse -->--}}


        <div class="collapse navbar-collapse col-xs-12  col-md-10 col-sm-12 col-lg-10" id="collapse-header">
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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





<!-- Image
================================================== -->
<div class="row">
    <div class="col-xs-12 col-md-10 col-sm-12 col-md-offset-1 col-lg-10">
        <a href="/" class="thumbnail">
            <img src="images/img1-main-page.jpg" >
        </a>
    </div>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
            <img class="img-circle" src="images/img2-main-page.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Ask our Experts</h2>
            <p>Bring your offline queries online !!We have a better answer</p>
            <p><a class="btn btn-secondary" href="/questions" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
            <img class="img-circle" src="/images/img-main-review.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Reviews</h2>
            <p>Excited about a product? Go ahead and let others know about your experience. Good or Bad? Be the voice of change.
                Also, make sure to peep into the reviews of others. Make an informed decision.</p>
            <p><a class="btn btn-secondary" href="/reviews" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
            <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 push-md-5">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 pull-md-7">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    {{--<footer class="navbar-inverse">
       --}}{{-- <p class="float-xs-right"><a href="#">Back to top</a></p>--}}{{--
        <p>&copy; <a href="/about">2016 Company,The Instreview</a>  &middot;&nbsp <a href="/contact">Contact Us</a> &middot; <a href="/disclaimer">Terms</a></p>
    </footer>--}}
<div class="row">

    <div class="panel-footer">
        <div class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
           &middot; <a href="/about">2016 Company,Instreview</a>&middot;
        </div>
        <div class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
            &middot;<a href="/contact">Contact Us</a>&middot;
        </div>
        <div class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
            &middot;<a href="/disclaimer">Terms</a>&middot;
        </div>
            </div>
</div>


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="/vendor/iron-summit-media/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
{{--<script src="../../assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>--}}

<script src="/vendor/iron-summit-media/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/vendor/iron-summit-media/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
