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
     background-color:darkcyan ;
">
                <ul class="nav navbar-nav" >
                    <li><a href="{{url('/profile')}}" style="color:#ffffff;">Profile</a></li>
                    <li ><a href="{{url('/profile/reviews')}}" style="background-color:cadetblue ;color:#ffffff;">Reviews</a></li>
                    <li ><a href="/profile/questions" style="color:#ffffff;">Expert's Corner</a></li>
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
                            <li id="toggleReview" data-toggle="tooltip" data-placement="top" title="Reviews Posted"><a href="#reviews">Reviews <span class="badge">{{count($reviewObj)}}</span></a></li> /
                            <li id="toggleComments" data-toggle="tooltip" data-placement="top" title="Commented on Reviews"><a href="#comments">Comments <span class="badge">{{count($commentObj)}}</span></a></li>
                        </ul>
                    </div>

                    <div class="panel-body " id="reviewSection">
                        <h4><b>Reviews Posted</b></h4>
                @foreach($reviewObj as $review)
                    <div class="panel panel-default" style="padding-left: 10px">


                            {{--<div class="panel-left col-md-4 col-xs-12 col-sm-12 " style="display: table-cell;vertical-align: middle;padding-right: 10px">
                                @if($review->image)

                                    <img  height="175px" width="125px" src="{{$review->image->url}}" alt="...">

                                @else
                                    <div style="height:175px;width:125px;border:1px solid #000;display: inline-block">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </div>
                                @endif
                            </div>--}}
                                <a href="{{url('reviews/'.$review->id)}}" class="text-primary"><h3>{{$review->title}}</h3></a>
                                <ul class="list-inline">
                                    <li class="fa fa-filter">{{$review->category->name}}</li>
                                    <li class="fa fa-clock-o"> {{$review->updated_at}} </li>
                                    @if($review->trashed())
                                        <li class="fa fa-lock"> Hidden from Public </li>
                                        @else
                                        <li class="fa fa-unlock"> Visible to Public </li>
                                        @endif

                                </ul>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @if($review->trashed())
                            <li class="fa fa-unlock disableSoftDelReview" data-toggle="tooltip" data-placement="top" title="Review will be visible on the site" value="{{$review->id}}" > <a>Mark as Visible</a> </li>
                            @else
                            <li class="fa fa-lock softDelReview" data-toggle="tooltip" data-placement="top" title="Review will get hidden from the site" value="{{$review->id}}" > <a >Mark as Hidden</a> </li>
                            @endif
                        <div class="alert" id="{{'review_'.$review->id}}" style="display: none">

                        </div>

                    </div>
                @endforeach
                    </div>




    <div class="panel-body " id="commentSection" style="display: none">
        <h4><b>Comments Posted</b></h4>
        @foreach($commentObj as $comment)
            <div class="panel panel-default" style="padding-left: 10px">


                {{$comment->content}}
                <ul class="list-inline">
                    @if($comment->reviews)
                    <li class="fa fa-folder"><a href="{{url('reviews/'.$review->id)}}"> {{$comment->reviews->title}} </a></li>
                    @else
                    <li class="fa fa-warning">Review Deleted or Marked as Hidden</li>
                    @endif
                    <li class="fa fa-clock-o"> {{$comment->updated_at}} </li>
                    @if($comment->trashed())
                        <li class="fa fa-lock"> Hidden from Public </li>
                    @else
                        <li class="fa fa-unlock"> Visible to Public </li>
                    @endif

                </ul>
                {{--<meta name="csrf-token" content="{{ csrf_token() }}">
                @if($comment->trashed())
                    <li class="fa fa-unlock disableSoftDelComments" data-toggle="tooltip" data-placement="top" title="Comment is visible on the site" value="{{$comment->id}}" > <a >Mark as Visible</a> </li>
                @else
                    <li class="fa fa-lock softDelComments" data-toggle="tooltip" data-placement="top" title="Comment will get hidden from the site" value="{{$comment->id}}" > <a >Mark as Hidden</a> </li>
                @endif
                <div class="alert" id="{{'review_'.$comment->id}}" style="display: none">--}}

                </div>
        @endforeach
            </div>

    </div>


    </div>

    </div>
    </div>


    @endsection