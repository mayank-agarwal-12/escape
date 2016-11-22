@extends('pages.searchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Application Helper</li>
    </ol>
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-12 col-md-offset-2">
                <div class="panel panel-primary" style="font-size: 16px">
                    <div class="panel-heading">
                        <h4><b>Application Helper</b></h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($deviceList)
                                    @foreach($deviceList as $device)
                                        <tr>
                                            <td>{{$device->id}}</td>
                                            <td><a href="{{url('applicationhelper/'.$device->name)}}">{{$device->name}}</a></td>


                                            @endforeach
                                        </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
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