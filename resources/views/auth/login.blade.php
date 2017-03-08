@extends('pages.nonsearchscript')

@extends('pages.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 full-width">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><b>Login</b></h2>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>


                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-12 text-center ">
                                <button type="submit" class="btn btn-primary" style="width: 100%">
                                    Login
                                </button>
                                </div>
                            <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-12 text-center">
                                <a class="btn btn-link" style="padding-right: 1px" href="{{ url('/password/reset') }}">
                                    Forgot Your Password/
                                </a>
                                <a class="btn btn-link" style="padding-left: 1px" href="{{ url('/register') }}">
                                    Sign Up
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="row text-center" style="padding-bottom: 10px">
                        <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-12 text-center" style="padding-bottom: 10px;">
                        <h4>OR</h4>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-12 text-center" style="padding-bottom: 10px;">
                            <a href="{{url('/redirect/facebook')}}" title="Login with facebook">
                                <div class=" icon-facebook" style="width: 100%">
                                    <i class="fa fa-facebook"></i>
                                    <span>Login with Facebook</span>
                                </div>
                            </a>
                            </div>
                        <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-12 text-center" >
                            <a href="/redirect/google" title="Login with google">
                                <div class="icon-google" style="width: 100%">
                                    <i class="fa fa-google"></i>
                                    <span >Login with Gmail</span>
                                </div>
                            </a>
                            </div>
                    </div>
<style>
div.icon-facebook
{
    background: #48629b none repeat scroll 0 0;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    line-height: 22px;
    padding: 7px 15px;
    vertical-align: middle;
    display: inline-block;
}
    div.icon-google
    {
        background: #dc4b38 none repeat scroll 0 0;
        border-radius: 3px;
        color: #ffffff;
        font-size: 13px;
        line-height: 22px;
        padding: 7px 15px;
        vertical-align: middle;
        display: inline-block;
    }
</style>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
