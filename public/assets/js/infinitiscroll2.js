var baseUrl = $('#baseUrl').val();
var limit = 6;

$(document).ready(function(){
    $(window).scroll(function(){
        var position = $(window).scrollTop();
        var bottom = $(document).height() - $(window).height();
        if( position == bottom ) {
            limit = limit + 6;
            $.ajax({
                url: baseUrl + '/addtocart/' + limit,
                method: "post",
                success: function (response) {
                    console.log(response);
                    if (response != null) {

                    }
                }
            });
        }
    });
});
