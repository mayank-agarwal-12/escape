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
                    <li role="presentation" ><a href="/profile/reviews">Reviews</a></li>
                    <li role="presentation" class="active"><a href="/profile/questions">Expert's Corner</a></li>
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
                        <h2><b>Questions Section</b></h2>
                        <ul class="list-inline">
                            <li data-toggle="tooltip" data-placement="top" title="Questions Posted"><a href="#questions">Questions <span class="badge">{{count($questionObj)}}</span></a></li>

                        </ul>
                    </div>

                    <div class="panel-body " >
                        <h4><b>Questions Posted</b></h4>
                        @foreach($questionObj as $ques)
                            <div class="panel panel-default" style="padding-left: 10px">


                                <a href="{{url('questions/'.$ques->id)}}" class="text-primary"><h3>{{$ques->title}}</h3></a>
                                <ul class="list-inline">
                                    <li class="fa fa-filter">{{$ques->category->name}}</li>
                                    <li class="fa fa-clock-o"> {{$ques->updated_at}} </li>
                                    @if($ques->trashed())
                                        <li class="fa fa-lock"> Hidden from Public </li>
                                    @else
                                        <li class="fa fa-unlock"> Visible to Public </li>
                                    @endif

                                </ul>
                                {{--<meta name="csrf-token" content="{{ csrf_token() }}">
                                @if($ques->trashed())
                                    <li class="fa fa-unlock disableSoftDelReview" data-toggle="tooltip" data-placement="top" title="Review will be visible on the site" value="{{$ques->id}}" > <a href="#">Mark as Visible</a> </li>
                                @else
                                    <li class="fa fa-lock softDelReview" data-toggle="tooltip" data-placement="top" title="Review will get hidden from the site" value="{{$ques->id}}" > <a href="#">Mark as Hidden</a> </li>
                                @endif
                                <div class="alert" id="{{'review_'.$ques->id}}" style="display: none">
--}}
                                </div>
                        @endforeach
                            </div>

                    </div>



                </div>


            </div>

        </div>
    </div>


@endsection