    @extends('pages.nonsearchscript')
    @extends('pages.footer')
    @extends('pages.header')

    @section('content')


    <iframe class=" fixed-right" src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Ftheinstreview%2F&width=63&layout=box_count&action=like&size=large&show_faces=true&share=true&height=65&appId=1409061219355287" width="63" height="100" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>


    <div class="container-fluid marketing" style="position: relative;display: block">

        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 full-width">
                    <div class="panel panel-info">


                        <div class="panel-heading" style="background-color:darkcyan ;color:#fff">
                            <h3 class="panel-title text-center"><a href="/reviews"><b>Reviews</b></a></h3>
                        </div>

                        <div class="panel-body" style="word-break: break-all">
                            <p class="text-center" style="word-break: keep-all">Excited about a product? Go ahead and use our platform to write about your experience. Keep Reviewing,Keep Inst-Reviewing.</p>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        @foreach($reviewList as $review)
                                            <div class="col-lg-3">
                                                <a href="{{url('reviews/'.$review->id)}}">
                                                    @if($review->image)
                                                        <img class="img-circle1  center-block" src="{{$review->image->url}}" alt="instrument reviews" width="auto" height="170px" style="max-width:100%">
                                                    @else
                                                        <div class="img-circle1" style="height:170px;width:270px;border:1px solid #000;display: inline-block">
                                                            <span class="glyphicon glyphicon-search text-center" aria-hidden="true"></span>
                                                        </div>
                                                    @endif

                                                    <p class="text-primary text-center" style="margin-top: 10px">{{$review->title}}</p></a>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-info">


                        <div class="panel-heading" style="background-color:darkcyan ;color:#fff">
                            <h3 class="panel-title text-center"><a href="/questions"><b>Questions & Answers</b></a></h3>
                        </div>

                        <div class="panel-body" style="word-break: break-all">
                            <div class="panel-left col-md-4 col-xs-12 col-sm-12 text-center" style="display: table-cell;vertical-align: middle;padding-right: 10px">

                                <a href="/questions">
                                    <img class="img-circle1  center-block" src="images/questions.jpeg" alt="instrument questions queries" width="auto" height="170" style="max-width: 100%;">
                                </a>
                                <h3><a  href="/questions" >Query/Expert Section</a></h3>
                                <p  style="word-break: keep-all">Do you have a query about your test

                                    application or your Electronic T&amp;M

                                    instrument? Ask our experts!</p>


                            </div>

                            <div class="panel-right col-md-8 col-xs-12 col-sm-12 " style="display: table-cell; vertical-align: top;padding-left: 10px ;word-break: break-all">
                                <div class="panel1 panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title ">Popular Questions</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($questionList as $question)
                                                <a href="{{url('questions/'.$question->id)}}"><li class="text-primary">{{$question->title}}</li></a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-xs-12 col-sm-12 full-width">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:darkcyan ;color:#fff"> <span class="glyphicon glyphicon-list-alt"></span><b> News </b></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="demo1" style="overflow-y: hidden; height: 210px;">
                                        @foreach($feed->get_items(0,20) as $item)
                                            <li style="" class="news-item">
                                                <a target="_blank" href="{{$item->get_link()}}"> {{ $item->get_title() }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 full-width">
                <div class="panel panel-info">


                    <div class="panel-heading" style="background-color:darkcyan ;color:#fff">
                        <h3 class="panel-title text-center"><a href="/comparisons"><b>Comparisons</b></a></h3>
                    </div>

                    <div class="panel-body" style="word-break: break-all">
                        <div class="panel-left col-md-4 col-xs-12 col-sm-12 text-center" style="display: table-cell;vertical-align: middle;padding-right: 10px">

                            <a href="/comparisons">
                                <img class="img-circle1  center-block" src="images/comparisons.jpg" alt="instrument questions queries" width="auto" height="170" style="max-width: 100%">
                            </a>
                            <h3><a  href="/comparisons" >Instrument Comparison</a></h3>
                            <p style="word-break: keep-all">Planning to buy a T&amp;M instrument?

                                Compare instruments from multiple

                                vendors before making a decision</p>


                        </div>

                        <div class="panel-right col-md-8 col-xs-12 col-sm-12 " style="display: table-cell; vertical-align: top;padding-left: 10px ;word-break: keep-all">
                            <div class="panel1 panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title ">Popular Comparisons</h3>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        @foreach($comparisonList as $comparison)
                                            <a href="{{url('comparisons/'.$comparison->name)}}"><li class="text-primary">{{$comparison->name}}</li></a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




                </div>




    <!-- Three columns of text below the carousel -->
    <div class="row" style="top: 685px">
        <div class="panel panel-info">


            <div class="panel-heading" style="background-color:darkcyan ;color:#fff">
                <h3 class="panel-title text-center"><b>Our Products</b></h3>
            </div>

            <div class="panel-body" style="word-break: break-all">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
            <a href="/questions">
                <img class="img-circle1  center-block" src="images/img-expert.jpg" alt="instrument questions queries" width="250" height="170">
            </a>
            <h3><a  href="/questions" >Expert's Corner</a></h3>


        </div><!-- /.col-lg-4 -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
            <a href="/reviews">
                <img class="img-circle1  center-block" src="/images/img-reviews.jpg" alt="instrument review" width="250" height="170"></a>
            <h3><a href="/reviews">Reviews</a></h3>

        </div><!-- /.col-lg-4 -->

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
            <a href="/applicationassistant">
                <img class="img-circle1  center-block" src="/images/img-application-helper.jpg" alt="instrument testing" width="250" height="170">
            </a>
            <h3><a href="/applicationassistant">Application Assistant</a></h3>
            {{--   <p>There are some tests absolutely

                   required before your product is ready

                   for the market. Know what they are!</p>
               <p><a class="btn btn-secondary" href="/applicationassistant" role="button">View details &raquo;</a></p>--}}
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
            <a href="/comparisons">
                <img class="img-circle1  center-block" src="images/img-comparison.jpg" alt="instrument comparison" width="250" height="170">
            </a>
            <h3><a href="/comparisons">Comparisons</a></h3>

        </div><!-- /.col-lg-4 -->

</div>
            </div>

    </div><!-- /.row -->




    </div><!-- /.container -->

    @endsection




