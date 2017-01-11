$(document).ready(function(){
    $(".softDel").click(function(){
        $.ajax({

                // The URL for the request
                url: "/api/reviews/softDelete",

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
                alert('done');
            })
            // Code to run if the request fails; the raw request and
            // status codes are passed to the function
            .fail(function( xhr, status, errorThrown ) {
                alert( "Sorry, there was a problem 11!" );
            })
    });
});