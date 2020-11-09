$(document).on('click', '.obrisiSize', function () {
    var id = $(this).attr('id');
    if(id != "") {
        var array = JSON.parse($("#removesize").val());
        array.push(id);
        $("#removesize").val("["+array+"]");
    }
    $(this).parent().remove();
});


