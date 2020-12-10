$(document).on('click', ".delete-from-cart-2",  function(e) {
    e.preventDefault();
    var ele = $(this);
    console.log(ele);
    $.ajax({
        url: base() + '/deletecart/' + ele.attr("data-id"),
        method: "get",
        success: function (response) {
            console.log(response);
            if(response != null) {
                ele.parent().parent().remove();
                $("#sizeof_cart1").html(response.sizeOf);
                $("#sizeof_cart2").html(response.sizeOf);
                $("#total").html(response.total);
            }
        }
    });
});

/* Get base url */
function base()
{
    var urlbase = location.host + '';

    if((location.href.indexOf("localhost:8000") !== -1)) {
        urlbase = "localhost:8000";
    } else if((location.href.indexOf("localhost") !== -1) || (location.href.indexOf("http://192.168.0.") !== -1)){
        var positionLocalHost = location.href.indexOf("localhost") + 9;
        urlbase = location.host + '/'+ location.href.substring(positionLocalHost).split('/')[1];

        urlbase = urlbase + "/public";
        return "http://" + urlbase;
    }

    return "https://" + urlbase;
}
