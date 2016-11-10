@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary" style="font-size: 16px">
                    <div class="panel-heading">
                        <h1><b>Application Helper</b></h1>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Name</th>
                                    <th>Test Cases</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($deviceList)
                                    @foreach($deviceList as $device)
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

    <!-- jQuery -->
    <script src="/vendor/iron-summit-media/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/vendor/iron-summit-media/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/iron-summit-media/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/iron-summit-media/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection