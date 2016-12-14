@extends('pages.adminpanel.header')
@extends('pages.adminpanel.sidebar')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Knowledge Base</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Knowledge Base
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($knowledgeBaseList)
                                    @foreach($knowledgeBaseList as $knowledgeBase)
                                        <tr>
                                            <td>{{$knowledgeBase->id}}</td>
                                            <td><a href="{{route('knowledgebase.edit',$knowledgeBase->id)}}">{{$knowledgeBase->title}}</a></td>
                                            <td>{{$knowledgeBase->description}}</td>
                                            <td>{{$knowledgeBase->category->name}}</td>
                                            <td>{{$knowledgeBase->user->name}}</td>
                                            <td>{{$knowledgeBase->link}}</td>

                                            <td> {!! Form::open(['method'=>'DELETE' , 'action'=>['Adminpanel\KnowledgeBase@destroy',$knowledgeBase->id]]) !!}
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
                      Knowledge Base Details
                    </div>
                    <!-- /.panel-heading -->
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(['method'=>'POST' , 'action'=>'Adminpanel\KnowledgeBase@store']) !!}
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        {!! Form::label('title','Title') !!}
                                        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title']) !!}
                                        </div>
                                <div class="form-group">
                                    {!! Form::label('description','Description') !!}
                                    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('category_id','Category') !!}
                                    {!! Form::select('category_id',['0'=>'Select Category']+$catLists,null,['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('user_id','User') !!}
                                    {!! Form::select('user_id',['0'=>'Select User']+$userLists,null,['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('link','Link') !!}
                                    {!! Form::url('link',null,['class'=>'form-control','placeholder'=>'https://abc.com']) !!}
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