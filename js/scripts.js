$(document).ready(function() {
    //index.php
    if ($.cookie('mode') == 'ajax') {
        $.cookie('mode', 'ajax', {expires: 7});
    } else {
        $.cookie('mode', 'html', {expires: 7});
    }
    //
    //nav click
    $('#nav-menu li').click(function() {
        if ($.cookie('mode') == 'ajax') {
            var page = $(this).attr('title');
            swapPage(page);
            $('#nav-button').click()
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
        var captcha = $('#g-recaptcha-response').val();
        $.ajax({
            type: "POST",
            url: "content/sendmail.php",
            data: {
                email: email,
                body: body,
                captcha: captcha,
            },
            success: function(status) {
                switch(status) {
                    case "sent":
                        $('.content').html(
                        "<p>Your message has been sent.</p>");
                        break;
                    case "invalid":
                        $('#invalid').html(
                        "<p>A valid email address is required.</p>");
                        break;
                    case "no_captcha":
                        $('#invalid').html(
                        "<p>You must complete the captcha.</p>");
                        break;
                    case "failed_captcha":
                        $('.content').html(
                        "<p>You failed the captcha.</p>");
                        break;
                    default:
                    //is an error
                        $('.content').html(
                        "<p>An error has occurred, please try again.<br /></p>");
                }
            }
        });
        return false;
    });
});
