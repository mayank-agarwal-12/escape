@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Answers</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Input Answers
                    </div>
                    @if (session('status'))
                        <div class="alert alert-warning">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if($expertList)
                                {!! Form::open(['method'=>'POST' , 'action'=>'Adminpanel\Answers@store']) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    {!! Form::label('question','Question') !!}
                                    {!! Form::text('question',$questionObj->title,['class'=>'form-control','disabled'=>true]) !!}
                                    {!! Form::hidden('question_id',$questionObj->id,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('content','Answer Content') !!}
                                    {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Enter Content','required'=>true]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('expert_id','ExpertList') !!}
                                    {!! Form::select('expert_id',['0'=>'Select Expert']+$expertList,null,['class'=>'form-control','required'=>true]) !!}
                                </div>

                                <div class="form-group">

                                    {!! Form::submit('Submit ',['class'=>'btn btn-default']) !!}
                                </div>


                                {!! Form::close() !!}

                                    @else
                                    Please assign <a href="{{route('experts.index')}}" >expert</a>.<br>No expert assigned for {{$questionObj->category->name}} category.
                                    OR <a href="{{route('answers.index')}}">Go Back</a>
                                @endif
                            </div>
                            <!-- /.col-lg-6 (nested) -->


                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.panel -->
        </div>



        </div>
    @endsection