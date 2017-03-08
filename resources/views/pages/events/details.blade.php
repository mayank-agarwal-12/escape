@extends('pages.eventscript')
@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/events') }}">Events</a></li>
        <li class="active">@if($event) {{$event->title}} @else NULL @endif</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-12 full-width">
                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><b>Sponsored by</b></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <img  height="75px" width="auto" src="{{$event->partners->image->url}}" alt="..." style="max-width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-12 full-width">



                <div class="panel panel-primary  text-center">
                    <h3 class="panel-title panel-heading"><b>Event</b></h3>
                </div>

                @if (session('status'))
                    <div class="alert alert-danger text-center">
                        {{ session('status') }}
                        <a href="{{ url('/events') }}"> Go Back </a>
                    </div>
                @else
                    {{-- @if (Auth::guest())
                         <div class="alert alert-warning text-center" role="alert">
                             Please
                             <a href="{{ url('/login') }}">Login/</a>
                             <a href="{{ url('/register') }}">Register</a> to view
                         </div>
                     @else--}}
                    <div class="panel panel-default">
                        <div class="panel-body text-center">


                            <div class="panel-right " style="display: table-cell; vertical-align: top;padding-left: 10px ;word-break:break-all">
                                <a href="{{url('events/'.$event->id)}}" class="text-primary"><h3>{{$event->title}}</h3></a>
                                <h4><div class="col-md-6 fa fa-clock-o" style="padding: 10px"> {{$event->event_date}} {{$event->event_time}}</div></h4>
                                <h4><div class="col-md-6 fa fa-map-marker" style="padding: 10px"> {{$event->address}} </div></h4>
                                <p>{{$event->description}}</p>
                                 @if (Auth::guest())
                         <div class="alert alert-warning text-center" role="alert">
                             Please
                             <a href="{{ url('/login') }}">Login/</a>
                             <a href="{{ url('/register') }}">Register</a> to sign up
                         </div>
                            @else
                                    @if($userSignedUp)
                                        <div class="text-primary"><b>Already Signed Up</b></div>
                                    @else
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                <div class="btn btn-primary eventSignUp" value={{$event->id}}>Sign Up</div>
                                <div id="signUpMsg_{{$event->id}}" class="signUpMsg" style="display: none"></div>
                                        @endif
                                     @endif
                            </div>

                        </div>
                    </div>
            </div>




                @endif

        </div>

    </div>

@endsection