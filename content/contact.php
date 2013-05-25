<?php require_once "Mail.php"; ?>

<?php
    $display = True;
    $invalid_email = False;

    if (isset($_REQUEST['email'])) {
        $copy1 = "<thekthuser@thekthuser.com>";
        $copy2 = "<christopher.mv.peters@gmail.com>";
        $from = $_REQUEST['email'];
        $subject = "Message from " . $from;
        $body = $_REQUEST['body'];

        /**$host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "thekthuser@thekthuser.com";
        $password = "YDjfC7LY6wow";**/
        
        if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
            $display = False;
            /**$headers1 = array(
                'From' => $from,
                'To' => $copy1,
                'Subject' => $subject,
                'Reply-To' => $from,
                'Content-Type' => 'text/plain; charset=ISO-2022-JP',
            );
            $headers2 = array(
                'From' => $from,
                'To' => $copy2,
                'Subject' => $subject,
                'Reply-To' => $from,
                'Content-Type' => 'text/plain; charset=ISO-2022-JP',
            );

            $smtp = Mail::factory('smtp',
                array(
                    'host' => $host,
                    'port' => $port,
                    'auth' => True,
                    'username' => $username,
                    'password' => $password
                )
            );**/
            //$mail = $smtp->send($copy1, $headers1, $body);
            //$mail = $smtp->send($copy2, $headers2, $body);
            if (PEAR::isError($mail)) {
                //print $mail->getMessage();
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
