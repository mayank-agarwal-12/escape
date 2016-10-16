@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Review List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($reviewObj)
                                    @foreach($reviewObj as $review)
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td><a href="{{route('reviews.edit',$review->id)}}">{{$review->title}}</a></td>
                                    <td>{{$review->content}}</td>
                                    <td>{{$review->category->name}}</td>
                                    <td>{{$review->user_id}}</td>
                                    @if($review->upload_id)
                                        <td>
                                            {!! Form::image($review->image->url,'Image') !!}
                                        </td>
                                        @else
                                        <td>NULL</td>
                                    @endif



                                    <td> {!! Form::open(['method'=>'DELETE' , 'action'=>['Adminpanel\Reviews@destroy',$review->id]]) !!}
                                        {{csrf_field()}}

                                        <div class="form-group col-md-12  ">

                                            {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6']) !!}
                                        </div>


                                        {!! Form::close() !!}
                                    </td>
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

@section('scripts')

    <!-- jQuery -->
    <script src="/vendor/iron-summit-media/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/iron-summit-media/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/vendor/iron-summit-media/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/vendor/iron-summit-media/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/iron-summit-media/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/iron-summit-media/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/vendor/iron-summit-media/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    @endsection