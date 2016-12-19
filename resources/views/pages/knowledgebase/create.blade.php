@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/knowledgebase') }}">Knowledge Base</a></li>
        <li class="active">Share a Thought</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-xs-12 col-sm-12 full-width">
                <div class="panel panel-primary">

                    <div class="panel-heading text-center">
                        <h1><b>Share a Thought</b></h1>
                    </div>

                    @if (session('permission'))
                        <div class="alert alert-warning">
                            {{ session('permission') }}
                            <a href="{{ url('/knowledgebase') }}">Go Back</a>
                        </div>
                    @else
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <a href="{{ url('/knowledgebase') }}">Click to see your share</a>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/knowledgebase') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-2 control-label">Title</label>

                                    <div class="col-md-9">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus placeholder="Enter Title">

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="content" class="col-md-2 control-label">Description</label>

                                    <div class="col-md-9">
                                        <textarea id="description" placeholder="Enter Description" class="form-control" name="description"  rows="8" required>{{ old('description') }}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            @endif
                    @endif
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection