@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Experts</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Expert Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($expertList)
                                    @foreach($expertList as $expert)
                                        <tr>
                                            <td>{{$expert->id}}</td>
                                            <td><a href="{{route('experts.edit',$expert->id)}}">{{$expert->name}}</a></td>
                                            <td>{{$expert->email}}</td>
                                            <td>{{$expert->mobile}}</td>
                                            @if($expert->category->count())

                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                            <i>Categories </i>
                                                            <i class="fa fa-caret-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-messages">
                                                            @foreach($expert->category as $category)
                                                                <li>
                                                                    <a href="#">
                                                                    <div>
                                                                        <strong> {{$category->name}}</strong>

                                                                    </div>
                                                                        </a>

                                                                </li>
                                                                <li class="divider"></li>
                                                            @endforeach
                                                        </ul>
                                                        <!-- /.dropdown-messages -->
                                                    </div>
                                                </td>
                                            @else
                                                <td>NULL</td>
                                            @endif

                                            <td> {!! Form::open(['method'=>'DELETE' , 'action'=>['Adminpanel\Experts@destroy',$expert->id]]) !!}
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
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      Input Expert Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['method'=>'POST' , 'action'=>'Adminpanel\Experts@store']) !!}
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
                                        </div>
                                <div class="form-group">
                                    {!! Form::label('email','Email Id') !!}
                                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'abc@xyz.com']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('mobile','Mobile') !!}
                                    {!! Form::number('mobile',null,['class'=>'form-control','placeholder'=>'9712XXXXXX']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('categories','Category') !!}
                                    {!! Form::select('categories[]',$categoryList,null,['class'=>'form-control','multiple'=>'']) !!}
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