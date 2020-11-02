$(document).on('click', ".cartBtn",  function(e) {
    e.preventDefault();
    var ele = $(this);
    console.log(ele);
    $.ajax({
        url: base() + '/addtocart/' + ele.attr("data-id"),
        method: "get",
        success: function (response) {
            console.log(response);
            if(response == "true") {
                ele.removeClass('cartBtn');
                ele.addClass('btn-danger');
                ele.text("Dodato");
            }
    }
    });
});

// $(document).on('click', ".update-cart-Btn",  function(e) {
//     e.preventDefault();
//     var ele = $(this);
//     var id = ele.attr("data-id");
//     //var quantity = "?quantity=";
//     console.log(ele);
//     $.ajax({
//         url: base() + '/addtocart/' + ele.attr("data-id"),
//         method: "get",
//         success: function (response) {
//             console.log(response);
//             if(response == "true") {
//             }
//         }
//     });
// });

$(document).on('click', ".remove-from-cart",  function(e) {
    e.preventDefault();
    var ele = $(this);
    console.log(ele);
    $.ajax({
        url: base() + '/deletecart/' + ele.attr("data-id"),
        method: "get",
        success: function (response) {
            console.log(response);
            if(response == "true") {
                ele.parent().parent().parent().remove();
            }
        }
    });
});

$(document).on("keyup keydown change", ".quantity",function(event){
    //code that's working like a charm
    var quantity = $(this).val();
    var id = $(this).attr('id').split("_").pop();
    var url = base() + '/addtocart/' + id + "?quantity=" + quantity;
    $.ajax({
        url: url,
        method: "get",
        success: function (response) {
            console.log(response);
            if(response == "true") {
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
