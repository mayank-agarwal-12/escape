@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/reviews') }}">Reviews</a></li>
        <li class="active">Create a review</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12">
                <div class="panel panel-primary">

                    <div class="panel-heading text-center">
                        <h1><b>New Review</b></h1>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <a href="{{ url('/reviews') }}">Click to see your review</a>
                        </div>
                    @else
                        @if (Auth::guest())
                            <div class="alert alert-warning text-center" role="alert">
                                Please
                                <a href="{{ url('/login') }}">Login/</a>
                                <a href="{{ url('/register') }}">Register</a> to continue
                            </div>
                        @else

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/reviews') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Review Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus placeholder="Enter Title">

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content" class="col-md-4 control-label">Content</label>

                                    <div class="col-md-6">
                                        <textarea id="content" placeholder="Enter Content" class="form-control" name="content"  rows="4" required>{{ old('content') }}</textarea>

                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label for="category_id" class="col-md-4 control-label">Category</label>

                                    <div class="col-md-6">

                                        {!! Form::select('category_id',['0'=>'Category Selection'] + $catLists,null,['class'=>'form-control','required'=>'true','value'=>"{{old('category_id')}}"]) !!}
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image" class="col-md-4 control-label">Image Uploader</label>

                                    <div class="col-md-6">

                                        {!! Form::file('image',['class'=>'form-control','required'=>'true']) !!}
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection