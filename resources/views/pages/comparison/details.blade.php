@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <style type="text/css" rel="stylesheet">
        @-moz-document url-prefix() {
            fieldset { display: table-cell; }
        }
    </style>
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/comparisons') }}">Comparisons</a></li>
        <li class="active">@if($comparisonObj) {{$comparisonObj->name}} @else NULL @endif</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-19 col-xs-19 col-sm-19">



                <div class="panel panel-primary  text-center">
                    <h3 class="panel-title panel-heading"><b>@if($comparisonObj) {{$comparisonObj->name}} @else NULL @endif</b></h3>
                </div>

                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                        <a href="{{ url('/comparisons') }}">Go Back</a>
                    </div>
                @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                        @if($tableHead)
                        <table width="100%" class="table table-striped table-bordered table-hover  ">

                            <thead>
                            <tr>
                                @foreach($tableHead as $head)
                                <th>{{$head}}</th>
                                    @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>

                                @foreach($comparisonArr as $head=>$model)
                                <tr>
                                    <td><strong>{{$head}}</strong></td>
                                    @foreach($model as $key=>$data)
                                    <td>{{$data}}</td>
                                        @endforeach
                                </tr>
                                    @endforeach


                            </table>

                        @endif
</div>
                    </div>
                </div>
@endif
            </div>

        </div>
    </div>
@endsection