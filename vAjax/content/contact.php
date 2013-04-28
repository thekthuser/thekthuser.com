<?php require_once "Mail.php"; ?>

<div class="content">
    <h2>Contact</h2>
    <form method="post" action='?title=contact'>
        <div class="text">Email: 
            <input type="text" name="email"><br />
        </div>
        <div class="text">Message:
            <textarea name="body" rows="20" cols="40"></textarea><br />
        </div>
        <input type="submit" value="Submit">
    </form>

    <?php if (isset($_REQUEST['email']) && ($_REQUEST['email'] != '')) { ?>
        <h1>submitted</h1>
        <h1><?php echo $_REQUEST['email']; ?></h1>
            <?php $_REQUEST['email'] = ''; ?>
    <?php } ?>
<div>
