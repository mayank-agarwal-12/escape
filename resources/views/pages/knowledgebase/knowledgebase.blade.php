@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb full-width">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">Knowledge Base</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-12 full-width">
              @if(!empty(Auth::user()->roles) &&  Auth::user()->roles == 'writer')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class=" text-center"><b>
                                <a style="color: #ffffff;" href="{{url('knowledgebase/create')}}">Share !!</a></b></h3>
                    </div>
                </div>
                @endif


                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><b>Popular Shares</b></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <ul>
                            @foreach($popularObj as $knowledgebase)
                                <a href="{{url('knowledgebase/'.$knowledgebase->id)}}"><li class="text-primary">{{$knowledgebase->title}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12 col-sm-12 full-width">



                    <div class="panel panel-primary  text-center">
                        <h3 class="panel-title panel-heading"><b>Knowledge Base</b></h3>
                    </div>

                    @foreach($knowledgeBaseObj as $knowledgebase)
                        <div class="panel panel-default">
                                <div class="panel-body text-center">


                                    <div class="panel-right1 col-md-12 col-xs-12 col-sm-12" style="display: table-cell; vertical-align: top;padding-left: 10px;word-break: break-all">
                                        <a href="{{url('knowledgebase/'.$knowledgebase->id)}}" class="text-primary"><h4>{{$knowledgebase->title}}</h4></a>
                                        <ul class="list-inline">
                                            <li class="fa fa-user"> {{$knowledgebase->user->name}} </li>
                                            {{--<li class="fa fa-clock-o"> {{$question->updated_at}} </li>--}}
                                        </ul>
                                        <p class="comment"><?php
                                            $knowledgebase->description=nl2br(str_replace('  ', ' &nbsp;', htmlspecialchars($knowledgebase->description)));

                                            echo preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.%-=#]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $knowledgebase->description);


                                            ?></p>
                                    </div>


                                </div>
                        </div>
                    @endforeach

                {{$knowledgeBaseObj->links()}}



            </div>

            </div>

    </div>
    {{--<script type="text/javascript">
        $(document).ready(function() {

            $(".comment").shorten({
                "showChars" : 10,
                "moreText"	: "See More",
                "lessText"	: "Less",
            });

        });
    </script>--}}
@endsection