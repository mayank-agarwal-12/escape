@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/applicationhelper')}}">Application Helper</a></li>
        <li class="active"> @if($device) {{$device->name}} @else NULL @endif</li>
    </ol>
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-12 col-md-offset-2">
                <div class="panel panel-primary" style="font-size: 16px">
                    <div class="panel-heading">
                        <h3><b>Application Helper</b></h3>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                            <a href="{{ url('/applicationhelper') }}">Go Back</a>
                        </div>
                    @else
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Name</th>
                                    <th>Test Cases</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($device)
                                        <tr>
                                            <td>{{$device->id}}</td>
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