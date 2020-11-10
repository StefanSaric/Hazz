$(document).on('click', '.add-active-pane', function() {
    var id = $(this).attr('id');
    $("#tab_" + id).tab("show");
});
