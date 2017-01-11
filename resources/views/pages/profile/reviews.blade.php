@extends('pages.myaccountscript')
@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">My Account</li>
    </ol>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-xs-12 col-sm-12 full-width" style="
    border-color: #f5f8fa;
    border-width: 1px;
    border-style: solid;
    padding: 0px;
    padding-bottom: 2px;
">
                <ul class="nav nav-tabs ">
                    <li role="presentation"><a href="/profile">Profile</a></li>
                    <li role="presentation" class="active"><a href="/profile/reviews">Reviews</a></li>
                    <li role="presentation"><a href="#">Expert's Corner</a></li>
                </ul>
            </div>
            </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-xs-12 col-sm-12 full-width" style="
    border-color: #f5f8fa;
    border-width: 1px;
    border-style: solid;
    padding: 0px;
">
                <div class="panel panel-default">


                    <div class="panel-heading">
                        <h2><b>Review Section</b></h2>
                        <ul class="list-inline">
                            <li class="active" data-toggle="tooltip" data-placement="top" title="Reviews Posted"><a href="/profile/reviews">Reviews</a></li>
                            <li data-toggle="tooltip" data-placement="top" title="Commented on Reviews"><a href="/profile/comments">Comments</a></li>
                        </ul>
                    </div>
                    <div class="panel-body ">
                @foreach($reviewObj as $review)
                    <div class="panel panel-deafult">


                            {{--<div class="panel-left col-md-4 col-xs-12 col-sm-12 " style="display: table-cell;vertical-align: middle;padding-right: 10px">
                                @if($review->image)

                                    <img  height="175px" width="125px" src="{{$review->image->url}}" alt="...">

                                @else
                                    <div style="height:175px;width:125px;border:1px solid #000;display: inline-block">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </div>
                                @endif
                            </div>--}}
                                <a href="{{url('reviews/'.$review->title)}}" class="text-primary"><h3>{{$review->title}}</h3></a>
                                <ul class="list-inline">
                                    <li class="fa fa-filter">{{$review->category->name}}</li>
                                    <li class="fa fa-clock-o"> {{$review->updated_at}} </li>
                                    <li class="fa fa-unlock"> Visible to Public </li>
                                </ul>
                        <li class="fa fa-lock softDel" data-toggle="tooltip" data-placement="top" title="Review will be disabled from the site" value="{{$review->id}}" > <a href="#">Mark as Private</a> </li>

                    </div>
                @endforeach
                    </div>


</div>

            </div>
        </div>
        </div>

    @endsection