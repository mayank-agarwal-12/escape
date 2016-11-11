@extends('layouts.app')

@section('content')
    <style type="text/css" rel="stylesheet">
        @-moz-document url-prefix() {
            fieldset { display: table-cell; }
        }
    </style>
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/comparisons') }}">Comparisons</a></li>
        <li class="active">{{$comparisonObj->name}}</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-19 ">



                <div class="panel panel-primary  text-center">
                    <h3 class="panel-title panel-heading"><b>Comparison</b></h3>
                </div>

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

            </div>

        </div>
    </div>
@endsection