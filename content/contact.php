<?php require_once "Mail.php"; ?>

<?php
    $display = True;
    $invalid_email = False;

    if (isset($_REQUEST['email'])) {
        $copy1 = "<thekthuser@thekthuser.com>";
        //$copy2 = "<christopher.mv.peters@gmail.com>";
        $from = $_REQUEST['email'];
        $subject = "Message from " . $from;
        $body = $_REQUEST['body'];

        if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
            $display = False;
            $mail = mail($copy1, $subject, $body);
            //$mail = mail($copy2, $subject, $body);
            if (!$mail) {
                print "<p>An error has occurred, please try again.<br /><p>";
            } else {
                print "<p>Your message has been sent.</p>";
            }
        } else {
            $invalid_email = True;
        }
    }
?>

<?php if ($display == True) { ?>
<div class="content">
    <h2>Contact</h2>
    <form method="post" title='contact'>

        <table><tbody>
            <tr><td>
                <input type="text" name="email" class="form" 
                placeholder="Email:">
            </td></tr>
            <tr><td>
                <textarea name="body" class="form" rows="20" cols="40" 
                placeholder="Message:"></textarea>
            </td></tr>
        </tbody></table>
       
        <input type="submit" value="Submit">
    </form>
    <?php if ($invalid_email) {
        print "<p>A valid email address is required.</p>";
    }?>
<div>
<?php } ?>
<div class="bottom"></div>
