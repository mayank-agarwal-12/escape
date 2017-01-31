@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Partners</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Partners
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper table-responsive" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="col-lg-1">S No</th>
                                    <th class="col-lg-1">Name</th>
                                    <th class="col-lg-1">Logo</th>
                                    <th class="col-lg-1">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($partnerList)
                                    @foreach($partnerList as $partner)
                                        <tr>
                                            <td >{{$partner->id}}</td>
                                            <td><a href="{{route('partners.edit',$partner->id)}}">{{$partner->name}}</a></td>

                                            @if($partner->logo_id)
                                                <td>
                                                    {!! Form::image($partner->image->url,'Image',['height'=>'125px','width'=>'90px']) !!}
                                                </td>
                                            @else
                                                <td>NULL</td>
                                            @endif

                                            <td> {!! Form::open(['method'=>'DELETE' , 'action'=>['Adminpanel\Partners@destroy',$partner->id]]) !!}
                                                {{csrf_field()}}

                                                <div class="form-group col-md-12  ">

                                                    {!! Form::submit('Delete',['class'=>'btn btn-danger col-md-12']) !!}
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
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Partner Details
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
                                {!! Form::open(['method'=>'POST' , 'action'=>'Adminpanel\Partners@store','enctype'=>"multipart/form-data"]) !!}
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
                                        </div>
                                <div class="form-group">
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description']) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('image','Logo Uploader') !!}
                                    {!! Form::file('image',['class'=>'form-control']) !!}
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