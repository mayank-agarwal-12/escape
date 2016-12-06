@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/questions') }}">Questions</a></li>
        <li class="active">@if($question ) {{$question->title}} @else NULL @endif</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-xs-12 col-sm-12 full-width">



                <div class="panel panel-primary  text-center">
                    <h3 class="panel-title panel-heading"><b>Question</b></h3>
                </div>

                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                        <a href="{{ url('/questions') }}">Go Back</a>
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-body text-center1">

                           
                            <div class="panel-right1 col-md-12 col-xs-12 col-sm-12" style="display: table-cell; vertical-align: top;padding-left: 10px;word-break: break-all">
                                <h3>{{$question->title}}</h3>
                                <ul class="list-inline">
                                    <li class="fa fa-filter">{{$question->category->name}}</li>
                                    <li class="fa fa-user"> {{$question->user->name}} </li>
                                    {{--<li class="fa fa-clock-o"> {{$question->updated_at}} </li>--}}
                                </ul>
                                <p>{{$question->content}}</p>
                            </div>



                            <div class="page-header" style="padding-top: 100px">
                                <h1>{{--<small class="pull-right">{{count($answers)}} answer</small>--}}<b>Answer</b> </h1>
                            </div>

                            @foreach($answers as $answer)
                            <div class="answers-list panel panel-default" style="padding: 10px">
                                <div class="media" style="border-bottom: 1px dotted #ccc;">
                                    {{--<p class="pull-right"><small>{{$answer->created_at}}</small></p>--}}

                                    <div class="media-body">

                                        <h4 class="media-heading fa fa-user" style=" font-size:14px;
    font-weight: bold;"> InstReview </h4>
                                        <div>
                                        {{$answer->content}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
            </div>
                    </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-12 full-width">
                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Popular Questions</b></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <ul>
                            @foreach($popularObj as $question)
                                <a href="{{url('questions/'.$question->id)}}"> <li class="text-primary">{{$question->title}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>

@endsection