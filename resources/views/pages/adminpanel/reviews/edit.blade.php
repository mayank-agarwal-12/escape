@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Category Uploader
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::model ($review,['method'=>'PATCH' , 'action'=>['Adminpanel\Reviews@update',$review->id],'enctype'=>"multipart/form-data"]) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    {!! Form::label('title','Review Title') !!}
                                    {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter Title']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('content','Review Content') !!}
                                    {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Enter Content']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('category_id','Category') !!}
                                    {!! Form::select('category_id',['0'=>'Category Selection'] + $catLists,null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('user_id','User') !!}
                                    {!! Form::select('user_id',['0'=>'Select User'] + $userLists,null,['class'=>'form-control']) !!}
                                </div>
                                @if($review->upload_id)
                                <div class="form-group">
                                    {!! Form::image($review->image->url,'Image') !!}
                                    {!! Form::label('remove_image','Remove Image') !!}
                                    {!! Form::checkbox('remove_image','1',null,[]) !!}
                                </div>
                                @endif
                                <div class="form-group">
                                    {!! Form::label('image','Image Uploader') !!}
                                    {!! Form::file('image',['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group  ">

                                    {!! Form::submit('Update ',['class'=>'btn btn-success col-sm-6']) !!}

                                </div>

                                {!! Form::close() !!}


                                {!! Form::open(['method'=>'GET' , 'action'=>'Adminpanel\Reviews@index']) !!}

                                <div class="form-group ">

                                    {!! Form::submit('Cancel',['class'=>'btn btn-default col-sm-6']) !!}
                                </div>


                                {!! Form::close() !!}
                          

                                   
                              


                            </div>
                            <!-- /.col-lg-6 (nested) -->


                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->

    </div>
    <!-- /.row -->
    </div>
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