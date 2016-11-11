@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Questions</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ">



                    <div class="panel panel-primary  text-center">
                        <h3 class="panel-title panel-heading"><b>Questions</b></h3>
                    </div>

                    @foreach($questionObj as $question)
                        <div class="panel panel-default">
                                <div class="panel-body">


                                    <div class="panel-right" style="display: table-cell; vertical-align: top;padding-left: 10px">
                                        <a href="{{url('questions/'.$question->title)}}" class="text-primary"><h3>{{$question->title}}</h3></a>
                                        <ul class="list-inline">
                                            <li class="fa fa-filter">{{$question->category->name}}</li>
                                            <li class="fa fa-user"> {{$question->user->name}} </li>
                                            <li class="fa fa-clock-o"> {{$question->updated_at}} </li>
                                        </ul>
                                        <p>{{$question->content}}</p>
                                    </div>


                                </div>
                        </div>
                    @endforeach

                {{$questionObj->links()}}



            </div>
            <div class="col-md-4 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class=" text-center"><b>
                                <a href="{{url('questions/create')}}">Click to Ask!!</a></b></h3>
                    </div>
                    </div>



                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><b>Popular Questions</b></h3>
                    </div>

                    <div class="panel-body">
                        <ul>
                            @foreach($popularObj as $question)
                                <a href="{{url('questions/'.$question->title)}}"><li class="text-primary">{{$question->title}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            </div>

    </div>

@endsection