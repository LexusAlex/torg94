jQuery(document).ready(function () {
    var categories = $('.field-record-categoryarray');
    var type = $('#record-tid');
    categories.hide();
    type.change(function(){
        if ($(this).val()=='2') {
            categories.show();
        }
        else {
            categories.hide();
        }
    });
    if (type.val()=='2') {
        categories.show();
    }

});
