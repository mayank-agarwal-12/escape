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
                    <li><a href="{{url('/profile')}}" style="background-color:cadetblue ;color:#ffffff;">Profile</a></li>
                    <li ><a href="{{url('/profile/reviews')}}" style="color:#ffffff;">Reviews</a></li>
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
                        <h2><b>Profile Details</b></h2>
                    </div>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/update') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }} {{
                            Auth::user()->company_name ? '' : 'has-warning'
                            }}">
                                <label for="company_name" class="col-md-4 control-label">Company Name</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="company_name" class="form-control" name="company_name" value="{{ Auth::user()->company_name }}">

                                    @if ($errors->has('company_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} {{
                            Auth::user()->designation ? '' : 'has-warning'
                            }}">
                                <label for="designation" class="col-md-4 control-label">Designation</label>

                                <div class="col-md-6">
                                    <input id="designation" type="designation" class="form-control" name="designation" value="{{ Auth::user()->designation }}">

                                    @if ($errors->has('designation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#passwordChange" aria-expanded="false" aria-controls="collapseExample">
                                        Change Password
                                    </button>

                                </div>
                            </div>















                            {{--<div class="collapse" id="passwordChange">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                    <label for="old_password" class="col-md-4 control-label">Old Password</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password" class="form-control" name="old_password" required>

                                        @if ($errors->has('old_password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            </div>--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    <div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="passwordChangeLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="passwordChangeLabel">Change Password</h4>
                </div>
                    <div class="alert chngPassAlert" style="display: none">
                    </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="chngPassword">
                        {{csrf_field()}}
                        {{--<div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control" name="old_password" required>

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submitPasswd">Change Password</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection