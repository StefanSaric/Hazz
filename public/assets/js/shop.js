var baseUrl = $('#baseUrl').val();

$(document).on('click', '.active-category', function() {
    var value = $(this).attr('id');
    console.log(value);
    if(value == 'svi'){
        value = 'opsta';
    }
    $('.opsta').hide();
    $('.'+value).show();
});


$(document).on('change', "#orderBy",  function() {
    var order = $(this).val();
    $.ajax({
        url: baseUrl + '/shoporder' +'?order='+order,
        method: "get",
        success: function (response) {
            if (response != null) {
                //$('.opsta').hide();
                data = JSON.parse(response)
                    sorted_append(data);
            }
        }
    });
});

function sorted_append(data) {
    var html = '';
    var in_carts = sessionStorage.getItem('cart');
    console.log(data);
    console.log(in_carts);
    html += '';
    for (i = 0; i < data.length; i++) {
        if (data[i].product != null) {
            html += `<div class="col-xl-4 col-md-6 col-sm-6 opsta`;
            for (j = 1; j < data[i].product.categories.length; j++) {
                html += data[i].product.categories[j];
            }
            html += `">`
                `<div class="single-product mb-30">
                <div class="product-img">'
                    <a href="` + baseUrl + `/single-product/` + data[i].id + `"><img src="` + data[i].product.materials[0].url + `" alt="" /></a>
                </div>
                <div class="product-item-details text-center">
                    <div class="product-name-review tab-product-name-review">
                        <div class="product-name mt-30 ">
                            <strong><a href="` + baseUrl + `/single-product/` + data[i].id + `">` + data[i].product.name + `</a></strong>
                        </div>
                        <div class="product-review">
                            <span class="special-price">Cena: ` + data[i].price + ` RSD</span>
                        </div>
                        <div class="product-review">
                            <span class="product-content">Pakovanje: ` + data[i].quantity + ` ` + data[i].unit + `</span>
                        </div>
                    </div>
                    <div class="add-to-cart-area clear ptb-35">
                        <div class="add-to-cart text-uppercase">`
                            // if(in_carts.hasOwnProperty(data[i].id)) {
                            //     `<button type="button" class="btn-danger" data-id="` + data[i].id + `">Dodato</button>`
                            // }
                            // else {
                            //     `<button type="button" class="cartBtn" data-id="` + data[i].id + `">Dodaj u korpu</button>`
                            // }
                        `</div>
                    </div>
                </div>
            </div>
        </div>`
        }
    }
}
