$(document).on('click', '.add-active-pane', function() {
    var id = $(this).attr('id');
    $("#tab_" + id).tab("show");
});

$('#sizeSelect').on('change', function(){
    var id = $(this).val();
    var baseUrl = $('#baseUrl').val();
    window.location = baseUrl + '/single-product/' + id;
});

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
