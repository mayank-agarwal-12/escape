$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".eventSignUp").click(function(){
        $.ajax({

                // The URL for the request
                url: "/events/signUp",

                // The data to send (will be converted to a query string)
                data: {
                    id:$(this).attr('value')
                },

                // Whether this is a POST or GET request
                type: "POST",

                // The type of data we expect back
                dataType : "json",
            })
            // Code to run if the request succeeds (is done);
            // The response is passed to the function
            .done(function( json ) {
                if(json.status == 'success')
                {
                    $('#signUpMsg_'+json.id).addClass('alert-'+json.status)
                        .text(json.msg)
                        .show();
                    $(".eventSignUp").hide();
                }
                else
                {
                    $('#signUpMsg_'+json.id).addClass('alert-danger')
                        .text(json.msg)
                        .show();
                    $(".eventSignUp").hide();
                }
            })
            // Code to run if the request fails; the raw request and
            // status codes are passed to the function
            .fail(function( xhr, status, errorThrown ) {
                $('.signUpMsg').addClass('alert-danger')
                    .text('Something went wrong')
                    .show();
                $(".eventSignUp").hide();
            })
    });

});