@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Events</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-12 full-width">

                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Partners</b></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <ul>
                            @foreach($partnerObj as $partner)
                                <img  height="75px" width="auto" src="{{$partner->image->url}}" alt="..." style="max-width: 100%">
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-12 full-width">



                <div class="panel panel-primary text-center">
                    <h3 class="panel-title panel-heading"><b>Events</b></h3>
                </div>

                @foreach($eventObj as $event)
                    <div class="panel panel-default">
                        <div class="panel-body text-center">

                            <div class="panel-left col-md-4 col-xs-12 col-sm-12 " style="display: table-cell;vertical-align: middle;padding-right: 10px;max-width: 100%">
                                @if($event->partners->image)

                                    <img  height="175px" width="auto" src="{{$event->partners->image->url}}" alt="..." style="max-width: 100%">

                                @else
                                    <div style="height:175px;width:175px;border:1px solid #000;display: inline-block;max-width: 100%">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </div>
                                @endif
                            </div>
                            <div class="panel-right col-md-8 col-xs-12 col-sm-12 " style="display: table-cell; vertical-align: top;padding-left: 10px ;word-break: break-all">
                                <a href="{{url('events/'.$event->id)}}" class="text-primary"><h3>{{$event->title}}</h3></a>
                                <h4><div class="col-md-12 " style="padding: 10px"> Organizer : {{$event->partners->name}}</div></h4>
                                <h4><div class="col-md-6 fa fa-clock-o" style="padding: 10px"> {{$event->event_date}} {{$event->event_time}}</div></h4>
                                <h4><div class="col-md-6 fa fa-map-marker" style="padding: 10px"> {{$event->address}} </div></h4>
                                {{-- <p>{{$review->content}}</p>--}}
                            </div>


                        </div>
                    </div>
                @endforeach

                {{$eventObj->links()}}



            </div>

        </div>

    </div>

@endsection