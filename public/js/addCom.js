jQuery( document ).ready( function( $ ) {
    $( '#add_comment' ).on( 'submit', function() {
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'author'              : $('.author').val(),
            'content'             : $('#text').val(),
            'post_id'             : $('#post_id').val()
        };
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : host + '/comment/add', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true,
            error: function(xhr, textStatus, thrownError) {
                alert('Something went to wrong.Please Try again later...');
            }
        })
        // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
                console.log(data);
                // here we will hand;le errors and validation messages
            });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    } );
});