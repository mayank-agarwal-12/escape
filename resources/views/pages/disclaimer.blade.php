@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active">T&C</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary" style="font-size: 16px">


                        <div class="panel-heading text-center">
                          <h1><b>Terms & Conditions</b></h1>
                        </div>

                        <div class="panel-body text-info">
                           <p> This Website will not be held responsible in any manner at any point of time if the user finds the information provided on this site not applicable and/or not useful or in any manner found incorrect for any reason. All the information given on this site is based on the data collected at/from various sources and the website does not claim the accuracy of the information as per the usage of the user. In this regard, the website cannot be held responsible if the information provided on this site is not useful to the user in any manner. The user will use the information at their own risk and cost.</p>

                        <p>All the information obtained by this site from the user, either by way of data/photograph/information/document may be used by the website for its promotional purposes for which the user shall have no claim and/or interest. The user shall not claim any compensation either by way of fees/charges/damages/compensation/renumeration from the website and the information shall remain within the exclusive domain of this website.</p>

                           <p>The user has by this agreement expressly agreed and permitted this site to use the information given either by way of data/photograph/information/document and the user shall have no right to file any civil or criminal case for defamation and/or damages in any court of law.</p>

                            <p>The viewing of this site has been allowed at the viewer’s responsibility and the site shall not be responsible for any views expressed by the viewers of this site. The website declares that the views expressed by the viewers of this website are their personal views and the company has no role in suggesting/naming/providing/entertaining any views in this regard.</p>
                        </div>
                </div>
            </div>
        </div>
    </div>


@endsection