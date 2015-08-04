<?php
    require_once "Mail.php";

    $status = "";

    $copy1 = "<thekthuser@thekthuser.com>";
    $from = $_POST['email'];
    $subject = "Message from " . $from;
    $headers = "Reply-To: " . $from;
    $body = $_POST['body'];

    if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
        $mail = mail($copy1, $subject, $body, $headers);
        if (!mail) {
            $status = "error";
        } else {
            $status = "sent";
        }
    } else {
        $status = "invalid";
    }

    echo $status;
?>
