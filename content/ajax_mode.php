<div class="content">
    <h2>Ajax Mode</h2>
    <p>This site was originally written with Ajax, and later rewritten in HTML for more desciptive urls. You can toggle between both modes by clicking the button below.</p>
    <br />
    <?php if ($_COOKIE['mode'] == 'ajax') { ?>
    <button type="button" id="ajax_toggle">Switch to HTML</button>
    <?php } else { ?>
    <button type="button" id="ajax_toggle">Switch to Ajax</button>
    <?php } ?>
</div>
