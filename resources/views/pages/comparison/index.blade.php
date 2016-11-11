@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Comparisons</li>
    </ol>
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-primary" style="font-size: 16px">
                    <div class="panel-heading">
                        <h1><b>Comparisons</b></h1>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tags</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($comparisonObj)
                                    @foreach($comparisonObj as $compare)
                                        <tr>
                                            <td><a href="{{url('comparisons/'.$compare->name)}}">{{$compare->name}}</a></td>
                                            @if($compare->tags->count())
                                                <td>
                                                    <ul>
                                                        @foreach($compare->tags as $tag)
                                                            <li>
                                                                <div>
                                                                    <em> {{$tag->name}}</em>
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

            <div class="col-md-4 ">
                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Top Comparisons</b></h3>
                    </div>

                    <div class="panel-body">
                        <ul>
                            @foreach($popularComparison as $comparison)
                                <a href="{{url('comparisons/'.$comparison->name)}}"><li class="text-primary">{{$comparison->name}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>



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