@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Questions</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-12 full-width">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class=" text-center"><b>
                                <a style="color: #ffffff;" href="{{url('questions/create')}}">Click to Ask!!</a></b></h3>
                    </div>
                </div>



                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><b>Popular Questions</b></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <ul>
                            @foreach($popularObj as $question)
                                <a href="{{url('questions/'.$question->id)}}"><li class="text-primary">{{$question->title}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-12 full-width">



                    <div class="panel panel-primary  text-center">
                        <h3 class="panel-title panel-heading"><b>Questions</b></h3>
                    </div>

                    @foreach($questionObj as $question)
                        <div class="panel panel-default">
                                <div class="panel-body text-center">


                                    <div class="panel-right1 col-md-12 col-xs-12 col-sm-12" style="display: table-cell; vertical-align: top;padding-left: 10px;word-break: break-all">
                                        <a href="{{url('questions/'.$question->id)}}" class="text-primary"><h4>{{$question->title}}</h4></a>
                                        <ul class="list-inline">
                                            <li class="fa fa-filter">{{$question->category->name}}</li>
                                            <li class="fa fa-user"> {{$question->user->name}} </li>
                                            {{--<li class="fa fa-clock-o"> {{$question->updated_at}} </li>--}}
                                        </ul>
                                        <p>{{$question->content}}</p>
                                    </div>


                                </div>
                        </div>
                    @endforeach

                {{$questionObj->links()}}



            </div>

            </div>

    </div>

@endsection