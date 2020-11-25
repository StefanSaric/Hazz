$(document).on('click', '.active-category', function() {
    var value = $(this).attr('id');
    console.log(value);
    if(value == 'svi'){
        value = 'opsta';
    }
    $('.opsta').hide();
    $('.'+value).show();
});


