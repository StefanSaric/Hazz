$(document).on('click', '#checkbox', function() {
    if($(this).is(':checked')){
        $('#order').attr("disabled", false);
    }
    else{
        $('#order').attr("disabled", true);
    }
})
