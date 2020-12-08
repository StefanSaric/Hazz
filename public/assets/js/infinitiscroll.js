var baseUrl = $('#baseUrl').val();
var products = 6;

$(document).ready(function(){
    $(window).scroll(function() {
        var position = $(window).scrollTop();
        var bottom = $(document).height() - $(window).height() - 400;
        if (position >= bottom) {
            var allproducts = Number($("#all_products").val());
            var productsperpage = 6;
            console.log(products);
            if (products <= allproducts) {
                var i;
                for(i=products;i<products + productsperpage;i++){
                    console.log($("#element" + i));
                    $("#element" + i).show();
                }
                products = products + 6;
            }
        }
    })
});
