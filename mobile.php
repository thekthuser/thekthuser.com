<html>
    <head>
    <?php //$browser = get_browser($_SERVER['HTTP_USER_AGENT'], true); 
        $agent = $_SERVER['HTTP_USER_AGENT'];
        //foreach ($agent as $i) {
         //   echo $i . '\n';
        //}
        //echo $agent;
        $mobile = True;
        #Thanks to detectmobilebrowsers.com! updated 5/23/13
    ?>
    <link href="css/reset.css" type="text/css" rel="stylesheet" />
    <link href="css/style.css" types="text/css" rel="stylesheet" />
    <link href="images/kth24.ico" type="image/png" rel="icon" />
    <script src="http://use.edgefonts.net/inconsolata.js"></script>
    <script type="text/javascript"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
    </script>
    <script type="text/javascript">
    <?php if (!$mobile) { ?>
        $(document).ready(function() {
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
        });
    <?php } else { ?> $(document).ready(function() { $('#nav-menu').css('display', 'block'); }); <?php }; ?>
    </script>
        <title>the kth user</title>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <!--<div id="h-left">&nbsp;</div>-->
                <div id="h-center"><h1>
                    <a href=''><span id="title">
                        the k<sup>th</sup><span id="title2"> user</span>
                    </span></a>
                </h1></div>
                <div id="h-right">&nbsp;</div>
            </div>
            <div id="nav">
            <?php if (!$mobile) { ?>
                <div id="nav-button"><a class="nav-link" href="index.php">
                    <li>Navigation &#x25BC;</li>
                </a></div>
                <ul id="nav-menu">
                    <a class="nav-link" href="?page=projects"><li>Projects</li></a>
                    <a class="nav-link" href="?page=sample_code"><li>Sample Code</li></a>
                    <a class="nav-link" href="?page=contact"><li>Contact</li></a>
                    <a class="nav-link" href="?page=about"><li>About</li></a>
                </ul>
            <?php } else { ?>
                <table style="background:#DAA520; color:#222222;">
                    <tr>
                        <td><br />Projects<br />Sample Code<br />
                            Contact<br/>About<br /></td>
                        <td><br />N<br />a<br />v<br />&#9658;<br /></td>
                    </tr>
                </table>
            <?php }; ?>
            </div>
            <div id="main">
                <?php 
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case "projects":
                            include("content/projects.php");
                            break;
                        case "sample_code":
                            include("content/sample_code.php");
                            break;
                        case "contact":
                            include("content/contact.php");
                            break;
                        case "about":
                            include("content/about.php");
                            break;
                        default:
                            echo '';
                            break;
                    }
                ?>
            </div>
        </div>
    </body>
</html>
