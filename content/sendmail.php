<?php
    require_once "Mail.php";

    $response = "";

    $copy1 = "<thekthuser@thekthuser.com>";
    $from = $_POST['email'];
    $subject = "Message from " . $from;
    $body = $_POST['body'];

    if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
        $mail = mail($copy1, $subject, $body);
        if (!mail) {
            $response = "<p>An error has occurred, please try again.<br /></p>";
        } else {
            $response = "<p>Your message has been sent.</p>";
        }
    } else {
        $response = "<p>A valid email address is required.</p>";
    }

    echo $response;
?>
