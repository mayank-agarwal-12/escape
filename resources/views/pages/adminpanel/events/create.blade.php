@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Events</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Event
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-9">
                                {!! Form::open(['method'=>'POST' , 'action'=>'Adminpanel\Events@store' ,'enctype'=>"multipart/form-data"]) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    {!! Form::label('title','Title') !!}
                                    {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter Title']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Enter Description']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('event_date','Event Date') !!}
                                    {!! Form::date('event_date',null,['class'=>'form-control','placeholder'=>'Select Date']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('event_time','Event Time') !!}
                                    {!! Form::time('event_time',null,['class'=>'form-control','placeholder'=>'Select Time']) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('address','Address') !!}
                                    {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter Address']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('partner_id','Partner') !!}
                                    {!! Form::select('partner_id',$partnerList,null,['class'=>'form-control']) !!}
                                </div>


                                <div class="form-group">

                                    {!! Form::submit('Submit ',['class'=>'btn btn-default']) !!}
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