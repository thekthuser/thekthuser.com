<html>
    <head>
        <link href="css/reset.css" type="text/css" rel="stylesheet" />
        <link href="css/style.css" types="text/css" rel="stylesheet" />
        <link href="images/kth24.ico" type="image/png" rel="icon" />
        <script src="http://use.edgefonts.net/inconsolata.js"></script>
        <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
            <title>the kth user</title>
    <?php include_once("analyticstracking.php"); ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="h-center"><h1>
                    <a href='index.php'><span id="title">
                        the k<sup>th</sup><span id="title2"> user</span>
                    </span></a>
                </h1></div>
                <div id="h-right">&nbsp;</div>
            </div>
            <div id="nav">
                <div id="nav-button"><a class="nav-link" href="index.php">
                    <li>Navigation &#x25BC;</li>
                </a></div>
                <ul id="nav-menu">
                <?php if ($_COOKIE['mode'] == 'ajax') { ?>
                    <li title="projects">Projects</li>
                    <li title="sample_code">Sample Code</li>
                    <li title="ajax_mode">Ajax Mode</li>
                    <li title="contact">Contact</li>
                    <li title="about">About</li>
                <?php } else { ?>
                    <a class="nav-link" href="?page=projects">
                    <li>Projects</li></a>
                    <a class="nav-link" href="?page=sample_code">
                    <li>Sample Code</li></a>
                    <a class="nav-link" href="?page=ajax_mode">
                    <li>Ajax Mode</li></a>
                    <a class="nav-link" href="?page=contact">
                    <li>Contact</li></a>
                    <a class="nav-link" href="?page=about">
                    <li>About</li></a>
                <?php } ?>
                </ul>
            </div>
            <div id="main">
                <?php if ($_COOKIE['mode'] == 'ajax') { ?>
                <script type="text/javascript">
                var title = "<?php echo $_REQUEST['title']; ?>";
                swapPage(title);
                function swapPage(page) {
                    switch(page) {
                        case 'projects':
                            $('#main').load('content/projects.php');
                            _gaq.push(['_trackEvent', 'Ajax_mode', 
                            'projects']);
                            break;
                        case 'sample_code':
                            $('#main').load('content/sample_code.php');
                            _gaq.push(['_trackEvent', 'Ajax_mode', 
                            'sample_code']);
                            break;
                        case 'ajax_mode':
                            $('#main').load('content/ajax_mode.php');
                            _gaq.push(['_trackEvent', 'Ajax_mode', 
                            'ajax_mode']);
                            break;
                        case 'contact':
                            $('#main').load('content/contact.php');
                            _gaq.push(['_trackEvent', 'Ajax_mode', 
                            'contact']);
                            break;
                        case 'about':
                            $('#main').load('content/about.php');
                            _gaq.push(['_trackEvent', 'Ajax_mode', 
                            'about']);
                            break;
                        default:
                            $('#main').html('');
                            _gaq.push(['_trackEvent', 'Ajax_mode', 
                            'main']);
                            break;
                    }
                }
                </script>
                <?php } else { 
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
                        case "ajax_mode":
                            include("content/ajax_mode.php");
                            break;
                        default:
                            echo '';
                            break;
                    }
                } ?>

            </div>
        </div>
    </body>
</html>
