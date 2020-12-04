var baseUrl = $('#baseUrl').val();
var category = 'opsta';

$(document).on('click', '.active-category', function() {
    category = $(this).attr('id');
    //console.log(value);
    if(category == 'svi'){
        category = 'opsta';
    }
    $('.opsta').hide();
    $('.'+category).show();
    $('#amount').change();
});

function sortProductsPrice(){
    var gridItems = $('.grid-item');
    gridItems.sort(function(a, b){
        return $('.product-card', a).data("price") - $('.product-card', b).data("price");
    });
    console.log($('.product-card').data("price"));
    $(".isotope-grid").append(gridItems);
}


$(document).on("change", ".orderby", function() {

    if($( "#orderby option:selected" ).val() == "price") {

        sortProductsPriceAscending();

    }
    else if($( "#orderby option:selected" ).val() == "name"){

        sortProductsNameAscending();
    }
});


function sortProductsPriceAscending() {
    var sortBox = $('.sortBox');
    sortBox.sort(function (a, b) {
        return $(a).data("price") - $(b).data("price");
    });
    $(".sortDiv1").append(sortBox);
}

function sortProductsPriceDescending() {
    var sortBox = $('.sortBox');
    sortBox.sort(function (a, b) {
        return $(b).data("price") - $(a).data("price");
    });
    $(".sortDiv1").append(sortBox);
}

function sortProductsNameAscending() {
    var sortBox = $('.sortBox');
    sortBox.sort(function (a, b) {
        return $(a).data("name").toUpperCase().localeCompare($(b).data("name").toUpperCase());
    });
    $(".sortDiv1").append(sortBox);
}


$("#amount").on('change',function(){
   var values =  $(this).val().split(' - ');
   if(values.length == 2){
       $('.opsta').each(function(){
           var price = $(this).attr('data-price');
           if(parseInt(values[0]) > parseInt(price) || parseInt(values[1]) < parseInt(price)){
               $(this).hide();
           }
           else{
                if($(this).hasClass(category)){
                   $(this).show();
               }
           }
       });
   }
});


