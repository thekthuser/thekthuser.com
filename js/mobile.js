$(document).ready(function() {

    $('#nav-button a').attr('href', '#');

    //drop & retract nav
    $('#nav-button').click(function() {
        $('#nav-menu').toggle();
    });
});
