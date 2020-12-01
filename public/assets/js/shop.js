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

    if($( "#orderBy option:selected" ).val() == "price") {
        //ovde ide sortiranje po ceni
        var priceOrderedDivs = $("#sortDiv1 .sortBox").sort(function (a, b) {
           // console.log(a.attr("data),$(a).attr("data-price"));
            return $(a).attr("data-price") > $(b).attr("data-price");
        });
        console.log(priceOrderedDivs);
        $("#sortDiv1").html(priceOrderedDivs);
    } else {
        //ovde ide sortiranje po nazivu
        var nameOrderedDivs = $("#sortDiv1.sortBox").sort(function (a, b) {
            return $(a).attr("data-price").toUpperCase().localeCompare($(b).attr("data-price").toUpperCase());
        });
        $("#sortDiv1").html(nameOrderedDivs);
    }
});


// function sorted_append(data) {
//     var html = '';
//     var i;
//     var j;
//     var in_carts = sessionStorage.getItem('cart');
//     console.log(data);
//     console.log(in_carts);
//     html += `<div role="tabpanel" class="tab-pane active" id="tab1">`;
//     html += '<div class="row">';
//     for (i = 0; i < data.length; i++) {
//         console.log(data[i]);
//         if (data[i].show == 1) {
//             html += `<div class="col-xl-4 col-md-6 col-sm-6 opsta>`;
//             for (j = 1; j < data[i].product.categories.length; j++) {
//                 html += data[i].categories[j];
//             }
//             html +=
//                 `<div class="single-product mb-30">
//                 <div class="product-img">'
//                     <a href="` + baseUrl + `/single-product/` + data[i].id + `"><img src="` + data[i].product.materials[0].url + `" alt="" /></a>
//                 </div>
//                 <div class="product-item-details text-center">
//                     <div class="product-name-review tab-product-name-review">
//                         <div class="product-name mt-30 ">
//                             <strong><a href="` + baseUrl + `/single-product/` + data[i].id + `">` + data[i].product.name + `</a></strong>
//                         </div>
//                         <div class="product-review">
//                             <span class="special-price">Cena: ` + data[i].price + ` RSD</span>
//                         </div>
//                         <div class="product-review">
//                             <span class="product-content">Pakovanje: ` + data[i].quantity + ` ` + data[i].unit + `</span>
//                         </div>
//                     </div>
//                     <div class="add-to-cart-area clear ptb-35">
//                         <div class="add-to-cart text-uppercase">`
//                             // if(in_carts.hasOwnProperty(data[i].id)) {
//                             //     `<button type="button" class="btn-danger" data-id="` + data[i].id + `">Dodato</button>`
//                             // }
//                             // else {
//                             //     `<button type="button" class="cartBtn" data-id="` + data[i].id + `">Dodaj u korpu</button>`
//                             // }
//                         `</div>
//                     </div>
//                 </div>
//             </div>
//         </div>`
//         }
//     }
//     html += `</div>`;
//     html += `</div>`;
//
//     html += `<div role="tabpanel" class="tab-pane active" id="tab1">`;
//     html += '<div class="row">';
//     for (i = 0; i < data.length; i++) {
//         if (data[i].product != null) {
//             html += `<div class="col-sm-12 opsta`;
//             for (j = 1; j < data[i].product.categories.length; j++) {
//                 html += data[i].product.categories[j];
//             }
//             html += `">`
//                 `<div class="single-product mb-30">
//                 <div class="product-img">'
//                     <a href="` + baseUrl + `/single-product/` + data[i].id + `"><img src="` + data[i].product.materials[0].url + `" width="150" height="150" alt="" /></a>
//                 </div>
//                 <div class="product-wrapper clear border-bottom mb-30">
//                     <div class="product-name-review">
//                         <div class="product-name">
//                             <strong><a href="` + baseUrl + `/single-product/` + data[i].id + `">` + data[i].product.name + `</a></strong>
//                         </div>
//                         <div class="product-review">
//                             <p>` + data[i].product.text + `</p>
//                         </div>
//                         <div class="readmore-btn">
//                             <a href="` + baseUrl + `/single-product/` + data[i].id + `">Saznaj više<i class="fa fa-long-arrow-right"></i></a>
//                         </div>
//                     </div>
//                     <div class="add-to-cart text-uppercase ptb-35 pull-left" style="right: 315px;bottom: 60px;">
//                         <ul>`
//                             // if(in_carts.hasOwnProperty(data[i].id)) {
//                             //     `<button type="button" class="btn-danger" data-id="` + data[i].id + `">Dodato</button>`
//                             // }
//                             // else {
//                             //     `<button type="button" class="cartBtn" data-id="` + data[i].id + `">Dodaj u korpu</button>`
//                             // }
//                        `</ul>
//                     </div>
//                 </div>
//             </div>
//         </div>`
//         }
//     }
//     html += `</div>`;
//     html += `</div>`;
//
//     $("#sort-products").html(html);
// }
