$(document).ready(function() {
    //index.php
    if ($.cookie('mode') == 'ajax') {
        $.cookie('mode', 'ajax', {expires: 7});
    } else {
        $.cookie('mode', 'html', {expires: 7});
    }
    //drop nav
    $('#nav-button').mouseenter(function() {
        $('#nav-menu').css('display', 'block');
        $('#nav-button').css('background', '#222222');
        $('#nav-button').css('color', '#DAA520');
    });
    //retract nav
    $('#nav-menu').mouseleave(function(){
        $('#nav-menu').css('display', 'none');
        $('#nav-button').css('background', '#DAA520');
        $('#nav-button').css('color', '#222222');
    });
    //nav click
    $('li').click(function() {
        if ($.cookie('mode') == 'ajax') {
            var page = $(this).attr('title');
            swapPage(page);
        }
    });


    //ajax_mode.php
    //$('#ajax_toggle').click(function() { 
    $(document).on("click", "#ajax_toggle", function() {
        if ($.cookie('mode') == 'html') {
            $.cookie('mode', 'ajax', {expires: 7});
            window.location = "index.php";
        } else {
            $.cookie('mode', 'html', {expires: 7});
            window.location = "index.php";
        }
    });


    //contact.php
    //$('#contact_button').click(function() {
    $(document).on("click", "#contact_button", function() {
        var email = $('#email').val();
        var body = $('#body').val();
        $.ajax({
            type: "POST",
            url: "content/sendmail.php",
            data: {
                email: email,
                body: body
            },
            success: function(response) {
                $('.content').html(response);
            }
        });
        return false;
    });
});
