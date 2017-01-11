@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/applicationassistant')}}">Application Assistant</a></li>
        <li class="active"> @if($device) {{$device->name}} @else NULL @endif</li>
    </ol>
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1 full-width">
                <div class="panel panel-primary" style="font-size: 16px">
                    <div class="panel-heading">
                        <h3><b>Application Assistant</b></h3>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                            <a href="{{ url('/applicationassistant') }}">Go Back</a>
                        </div>
                    @else
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Test Cases</th>
                                </tr>
                                </thead>

                                @if (Auth::guest())
                                    <div class="alert alert-warning text-center" role="alert">
                                        Please
                                        <a href="{{ url('/login') }}">Login/</a>
                                        <a href="{{ url('/register') }}">Register</a> to view
                                    </div>
                                @else
                                    <tbody>
                                @if($device)
                                        <tr>
                                            <td>{{$device->name}}</td>
                                            @if($device->testcases->count())

                                                <td>
                                                    <ul >
                                                        @foreach($device->testcases as $testcase)
                                                            <li>
                                                                <div>
                                                                    <strong> {{$testcase->name}}</strong>

                                                                </div>

                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </td>
                                            @else
                                                <td>NULL</td>
                                            @endif


                                        </tr>
                                        @endif
                                    </tbody>
                                    @endif

                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    @endif
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.row -->
    </div>


@endsection