$(document).on('click', '.add-active-pane', function() {
    var id = $(this).attr('id');
    $("#tab_" + id).tab("show");
});

$('#sizeSelect').on('change', function(){
    var id = $(this).val();
    var baseUrl = $('#baseUrl').val();
    window.location = baseUrl + '/single-product/' + id;
});
