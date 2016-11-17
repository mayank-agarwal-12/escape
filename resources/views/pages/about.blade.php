@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">About</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12">
                <div class="panel panel-primary" style="font-size: 16px">


                    <div class="panel-heading text-center">
                        <h1><b>About Us</b></h1>
                    </div>

                    <div class="panel-body">
                        <p class=" bg-info text-info"><b>Why was TheInstReview launched?</b></p>
                        <p> We believe that selecting an instrument for measurement should be a lesser concern than making the measurement itself. We make this possible with one-stop instrument information that is unbiased, free, concise and easy to understand.</p>

                     <p class=" bg-info text-info"><b>How Does TheInstReview help make choices?</b></p>   <p>You may be faced with a simple decision – which instrument will suit my measurement requirements. Or you may be pondering over your long-term investment choices – should I invest in the product of Company A or Company B? Or the choice in front of you could be much graver – perhaps you are considering setting up a lab in your college or your office. In all these cases, the best way out would be to research, discuss or ask about different aspects related to the choice. But there was no single source that gives you all of this under one roof. That is, until we launched theinstreview.</p>

                        <p class="bg-info text-info"><b>Review Section</b></p><p>When you are faced with choices, you are looking for unbiased information. Why not hear it from people who are already using the products. Surely that will give you an unbiased information.
                            Further, if you wish to spread your knowledge, feel free to write a review yourself.</p>

                        <p class="bg-info text-info"><b>Ask the experts (Discussion Forums)</b></p><p>

                            We believe that people want to help. So we have requested Experts from the industry to help you with your queries. If you have a question, we have an expert ready to answer it for you. You think you have an opinion too, feel free to answer other queries.

                        <p class="bg-info text-info"><b> Where are we based?</b></p><p>
                            Mostly in the servers. What’s not virtual is in Delhi.

                        <p class="bg-info text-info"><b>Advertise</b></p><p>
                            theinstreview.com is sustained by advertising. If you’d like to advertise with us, please contact us.

                        <p class="bg-info text-info"><b> Contact Us</b></p><p>
                            For feedback, comments, bouquets and brickbats, reach us at <a href="mailto:contact@theinstreview.com" target="_top" >contact@theinstreview.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection