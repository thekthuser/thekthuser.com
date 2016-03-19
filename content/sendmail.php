<?php
    require_once "Mail.php";

    $status = "";

    if (isset($_POST['captcha'])) {
        $captcha = $_POST['captcha'];
    }

    if (!$captcha) {
        $status = "no_captcha";
    } else {

        $secret = "6LdZ3fASAAAAACsSG9tU9lK12PLXwrZwLfzIZOKA";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $responseKeys = json_decode($response, true);

        if (intval($responseKeys['success']) !== 1) {
            $status = "failed_captcha";
        } else {

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

        }
    }

    echo $status;
?>
