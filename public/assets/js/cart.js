$(document).on('click', ".cartBtn",  function(e) {
    e.preventDefault();
    var ele = $(this);
    console.log(ele);
    $.ajax({
        url: base() + '/addtocart/' + ele.attr("data-id"),
        method: "get",
        success: function (response) {
            console.log(response);
            if (response != null) {
                console.log(response);
                console.log(response.price, response.product);
                ele.removeClass('cartBtn');
                ele.addClass('btn-danger');
                ele.text("Dodato");
                $("#cart_div").append(`
                    <div class="cart-item ptb-20 border-bottom" >
                        <div class="cart-item-details text-center">
                            <a href="` + base() + `/single-product/` + ele.attr("data-id") + `">` + response.product.name + `</a>
                        </div><br>
                        <div class="cart-item-details text-center">
                            <div class="cart-img pull-left col-md-auto-12" >
                                <a href="` + base() + `/single-product/` + response.id + `">
                                    <img src="` + base() + "/" + response.product.materials[0].url + `" alt="" />
                                </a>
                            </div>
                            <div class="cart-item-details clear pull-left">
                                <h6>Cena: ` + response.price + ` RSD</h6>
                                <h6>Pakovanje:` + response.quantity + response.unit + `</h6>
                            </div>
                        </div><br>
                        <div class="details-qty col-md-auto-12 pull-right">
                            <a href="#" class="delete-from-cart" data-id= `+response.id +`><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                        </div>
                    </div>
                `);
                $("#sizeof_cart1").html(response.sizeOf);
                $("#sizeof_cart2").html(response.sizeOf);
                $("#subtotal").html(response.total);
            }
        }
    });
});


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
