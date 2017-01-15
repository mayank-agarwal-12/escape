$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".softDel").click(function(){
        $(".softDel").unbind("click");
        $.ajax({

                // The URL for the request
                url: "/reviews/softDelete",

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
                    $('#review_'+json.id).addClass('alert-'+json.status)
                        .text(json.msg)
                        .show();
                    window.setTimeout(function(){location.reload()},3000);

                }
                else
                {
                    $('#review_'+json.id).addClass('alert-danger')
                        .text(json.msg)
                        .show();
                    window.setTimeout(function(){location.reload()},3000)
                }
            })
            // Code to run if the request fails; the raw request and
            // status codes are passed to the function
            .fail(function( xhr, status, errorThrown ) {
                alert( "Sorry, there was a problem !" );
            })
    });

    $(".disableSoftDel").click(function(){
        $(".disableSoftDel").unbind("click");
        $.ajax({

                // The URL for the request
                url: "/reviews/removeSoftDelete",

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
                    $('#review_'+json.id).addClass('alert-'+json.status)
                    .text(json.msg)
                        .show();
                    window.setTimeout(function(){location.reload()},3000)

                }
                else
                {
                    $('#review_'+json.id).addClass('alert-danger')
                    .text(json.msg)
                        .show();
                    window.setTimeout(function(){location.reload()},3000)
                }
            })
            // Code to run if the request fails; the raw request and
            // status codes are passed to the function
            .fail(function( xhr, status, errorThrown ) {
                alert( "Sorry, there was a problem !" );
            })
    });

    $("#chngPassword").submit(function(){
        event.preventDefault();
        $('input[type="submit"]').attr('disabled','disabled');
        $('.chngPassAlert').removeClass('alert-danger');
        var data = $('form').serialize();
        $.ajax({

                // The URL for the request
                url: "/user/updatePassword",

                // The data to send (will be converted to a query string)
                data:data,

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

                    $('.chngPassAlert').addClass('alert-'+json.status)
                        .text(json.msg)
                        .show();
                    window.setTimeout(function(){location.reload()},2000)

                }
                else
                {
                    $('.chngPassAlert').addClass('alert-danger')
                        .text(json.msg)
                        .show();
                    $('input[type="submit"]').removeAttr('disabled');
                }
            })
            // Code to run if the request fails; the raw request and
            // status codes are passed to the function
            .fail(function( xhr, status, errorThrown ) {
                alert( "Sorry, there was a problem !" );
            })
    });

    $('#toggleReview').click(function(){
        $('#commentSection').hide();
        $('#reviewSection').show();

    });

    $('toggleComments').click(function(){
        $('#commentSection').show();
        $('#reviewSection').hide();

    });


});