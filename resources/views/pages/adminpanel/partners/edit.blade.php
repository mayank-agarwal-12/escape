@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Partners Edit
                    </div>
                    <!-- /.panel-heading -->
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::model ($partnerList,['method'=>'PATCH' , 'action'=>['Adminpanel\Partners@update',$partnerList->id],'enctype'=>"multipart/form-data"]) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    {!! Form::label('name','Name') !!}
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description']) !!}
                                </div>


                                @if($partnerList->logo_id)
                                    <div class="form-group " >
                                        {!! Form::image($partnerList->image->url,'Image',['height'=>'150px','width'=>'auto']) !!}
                                        {!! Form::label('remove_image','Remove Image') !!}
                                        {!! Form::checkbox('remove_image','1',null,[]) !!}
                                    </div>
                                @endif
                                <div class="form-group">
                                    {!! Form::label('image','Logo Uploader') !!}
                                    {!! Form::file('image',['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">

                                    {!! Form::submit('Update ',['class'=>'btn btn-default col-sm-6']) !!}
                                </div>


                                {!! Form::close() !!}

                                {!! Form::open(['method'=>'GET' , 'action'=>'Adminpanel\KnowledgeBase@index']) !!}

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