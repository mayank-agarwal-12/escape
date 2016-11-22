@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/reviews') }}">Reviews</a></li>
        <li class="active">@if($review) {{$review->title}} @else NULL @endif</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-xs-12 col-sm-12">



                <div class="panel panel-primary  text-center">
                    <h3 class="panel-title panel-heading"><b>Review</b></h3>
                </div>

                @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                    <a href="{{ url('/reviews') }}">Go Back</a>
                </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-body text-center">

                            <div class="panel-left col-md-4 col-xs-12 col-sm-12"  style="display: table-cell;vertical-align: middle;padding-right: 10px">
                                <img  height="175px" width="125px" src="{{$review->image->url}}" alt="...">
                            </div>
                            <div class="panel-right col-md-8 col-xs-12 col-sm-12" style="display: table-cell; vertical-align: top;padding-left: 10px;word-break: break-all">
                                <a class="text-primary"><h3>{{$review->title}}</h3></a>
                                <ul class="list-inline">
                                    <li class="fa fa-filter">{{$review->category->name}}</li>
                                    <li class="fa fa-user"> {{$review->user->name}} </li>
                                    <li class="fa fa-clock-o"> {{$review->updated_at}} </li>
                                </ul>
                                <p>{{$review->content}}</p>
                            </div>


                        </div>
                    </div>
                            <div class="page-header">
                                <h1><small class="pull-right">{{count($comments)}} comments</small> Comments </h1>
                            </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (Auth::guest())
                    <div class="alert alert-warning text-center" role="alert">
                        Please
                        <a href="{{ url('/login') }}">Login/</a>
                        <a href="{{ url('/register') }}">Register</a> to continue
                    </div>
                    @else
                <div class="media" style="border-bottom: 1px dotted #ccc;">
                <form class="form-inline" role="form" method="POST" action="{{ url('/comments') }}" style="padding: 20px 0">
                    {{ csrf_field() }}
                    <div class="form-group " style="display: block">
                        <textarea row="2" type="text" class="form-control" id="content" name="content" placeholder="Join our discussion" style="width: 100%"></textarea>
                    </div>
                    <input type="hidden" name="review_id" value="{{$review->id}}">
                    <button type="submit" class="btn btn-default">Comment</button>
                </form>
</div>
@endif

                            @foreach($comments as $comment)
                            <div class="comments-list" style="padding: 10px">
                                <div class="media" style="border-bottom: 1px dotted #ccc;">
                                    <p class="pull-right"><small>{{$comment->created_at}}</small></p>

                                    <div class="media-body">

                                        <h4 class="media-heading" style=" font-size:14px;
    font-weight: bold;">{{$comment->user->name}}</h4>
                                        {{$comment->content}}

                                    </div>
                                </div>
                            </div>
                                @endforeach
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class=" text-center"><b>
                                <a href="{{url('reviews/create')}}">Post a Review!!</a></b></h3>
                    </div>
                </div>

                <div class="panel panel-info">


                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Popular Reviews</b></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <ul>
                            @foreach($popularReview as $review)
                                <a href="{{url('reviews/'.$review->title)}}"> <li class="text-primary">{{$review->title}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>

        </div>

    </div>

@endsection