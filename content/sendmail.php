<?php
    require_once "Mail.php";

    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }

    if (!$captcha) {
        $status = "no_captcha";
    }

    $secret = "6LdZ3fASAAAAACsSG9tU9lK12PLXwrZwLfzIZOKA";
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret" . 
        $secret . "&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

    if ($response, success == false) {
        $status = "failed_captcha";
    } else {
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
    }
?>
