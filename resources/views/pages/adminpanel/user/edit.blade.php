@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit User
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::model ($userObj,['method'=>'PATCH' , 'action'=>['Adminpanel\User@update',$userObj->id],'enctype'=>"multipart/form-data"]) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    {!! Form::label('name','User Name') !!}
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email','Email') !!}
                                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'abc@example.com']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('status','Status') !!}
                                    {!! Form::select('status',['Active','Inactive'],$userObj->status,['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('roles','Roles') !!}
                                    {!! Form::select('roles',['None','Writer','Reader'],null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group  ">

                                    {!! Form::submit('Update ',['class'=>'btn btn-success col-sm-6']) !!}

                                </div>

                                {!! Form::close() !!}


                                {!! Form::open(['method'=>'GET' , 'action'=>'Adminpanel\User@index']) !!}

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