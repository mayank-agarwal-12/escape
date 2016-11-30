@extends('pages.nonsearchscript')
@extends('pages.footer')
@extends('pages.header')


@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">What are we?</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12">
                <div class="panel panel-primary" style="font-size: 16px">


                    <div class="panel-heading text-center">
                        <h3><b>The World needs to know! You owe it to them.</b></h3>
                    </div>

                    <div class="panel-body">
                        <p class=" bg-info text-info"><b>Why was InstReview launched?</b></p>
                        <p> We believe that selecting an instrument for measurement should be a lesser concern

                            than making the measurement itself. A bad buy will not only cost you money but will

                            also cost you your time. We help you reduce this latency by providing one-stop

                            electronics T&amp;M information portal that is unbiased, free, concise and easy to

                            understand.</p>

                     <p class=" bg-info text-info"><b>How Does InstReview help make choices?</b></p>   <p>You may be faced with a simple decision – which instrument will suit my measurement

                            requirements. Or you may be pondering over your long-term investment choices –

                            should I invest in the product of Company A or Company B? Or the choice in front of you

                            could be much more vital – perhaps you are considering to set up a lab in your college

                            or your office. In all these cases, the best way out would be to research, discuss or ask

                            about different aspects related to your choice. But there was no single source that gave

                            you all of this on a single platform. That is, until we launched InstReview. Here’s how we

                            help you:</p>
                        <ul>
                        <li class="bg-info text-info"><b>Instrument Comparison</b></li><p>You always compare products from multiple vendors before narrowing down on a

                                single product right? But isn’t it a tough task to manually go through all the

                                datasheets to check for the specifications? Gone are those days. We will give you

                                ready comparisons between similar products to help you come to conclusion at the

                                earliest.</p>

                        <li class="bg-info text-info"><b>Expert Corner</b></li><p>

                                Do you have a query about your testing needs or the product itself? We have

                                gathered a team of Experts from different aspects of the industry to help you with

                                your queries across multiple domains : RF, Digital, Wireless, General Purpose

                                testing. If you have a question, we have an expert ready to answer it for you.
                           </p>
                            <li class="bg-info text-info"><b>Instrument Reviews</b></li><p>

                                When you are faced with choices, you are looking for unbiased information. Before

                                you buy any Electronics T&amp;M instrument, why not read about the experiences of

                                the people who are already using the product. Through this platform you will read

                                about the experiences of existing users with T&amp;M instruments.

                                Further, if you wish to spread your knowledge, feel free to write a review yourself.
                            </p>
                            <li class="bg-info text-info"><b>Application Assistant</b></li><p>
                                Before your product is ready for the market, there are some important tests that

                                should be carried out. Want to know what they are? Just visit our ‘Application

                                Assistant’ section to find it out. If you have further questions, feel free to contact

                                our experts.
                            </p>
                        </ul>

                        <p class="bg-info text-info"><b> Where are we based?</b></p><p>
                            Mostly in the servers. What&#39;s not virtual is in Delhi.

                        <p class="bg-info text-info"><b>Advertise</b></p><p>
                            <a href="/">Theinstreview.com</a> is sustained by advertising. If you&#39;d like to advertise with us,

                            please contact us.

                        <p class="bg-info text-info"><b> Contact Us</b></p><p>
                            For feedback, comments, bouquets and brickbats, reach us at <a href="mailto:contact@theinstreview.com" target="_top" >contact@theinstreview.com</a> or leave us a note from the <a href="/contact">Contact us </a>page.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection