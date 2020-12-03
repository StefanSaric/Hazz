$(document).on('click', ".cartBtn-2",  function(e) {
    e.preventDefault();
    var ele = $(this);
    var sizeID = $("#sizeID").val();
    var quant = $("#quantity_"+sizeID).val();
    var stock = $("#sizestock").val();
    console.log(quant);
    console.log(stock);
    if(quant > stock){
        alert('Trenutno ne postoji toliki broj proizvoda!');
        }
    else {
        $.ajax({
            url: base() + '/addtocart/' + ele.attr("data-id") + '?action=overwrite&quantity=' + quant,
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
                    <div class="cart-item ptb-30 border-bottom" style="margin-bottom: 0px;padding-top: 10px;padding-bottom: 50px;" >
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
                                <h6 style="padding-left: 30px;">Cena: ` + response.price + ` RSD</h6>
                                <h6 style="padding-left: 30px;">Pakovanje:` + response.quantity + response.unit + `</h6>
                            </div>
                        </div><br>
                        <div class="details-qty col-md-auto-12 pull-right">
                            <a href="#" class="delete-from-cart" data-id= ` + response.id + `><i class="fa fa-trash-o" style="font-size:24px;padding-right: 20px;"></i></a>
                        </div>
                    </div>
                `);
                    $("#sizeof_cart1").html(response.sizeOf);
                    $("#sizeof_cart2").html(response.sizeOf);
                    $("#subtotal").html(response.total);
                }
            }
        });
    }
});

$(document).on("keyup keydown change", ".quantity",function(event){
    //code that's working like a charm
    var quantity = $(this).val();
    var id = $(this).attr('id').split("_").pop();
    var url = base() + '/addtocart/' + id + "?action=overwrite&quantity=" + quantity;
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
