<html>
    <head>
    <link href="css/reset.css" type="text/css" rel="stylesheet" />
    <link href="css/style.css" types="text/css" rel="stylesheet" />
    <link href="images/kth24.ico" type="image/png" rel="icon" />
    <script src="http://use.edgefonts.net/inconsolata.js"></script>
    <script type="text/javascript"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

        var title = "<?php echo $_REQUEST['title']; ?>";
        swapPage(title);
        //alert("<?php echo "ASDF"; ?>");
        //<?php session_start(); ?>
        //alert("<?php echo $_SESSION['page']; ?>");

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

            function swapPage(page) {
                //alert(page);
                switch(page) {
                    case 'projects':
                        $('#main').load('content/projects.php');
                        <?php //$_SESSION['page'] = "projects"; ?>
                        break;

                    case 'sample_code':
                        $('#main').load('content/sample_code.php');
                        break;

                    case 'contact':
                        $('#main').load('content/contact.php', 
                        {'email': '<?php echo $_REQUEST['email']; ?>'});
                        break;

                    case 'about':
                        $('#main').load('content/about.php');
                        break;
                    
                    default:
                        $('#main').html('');
                        break;
                }
            }

            $('li').click(function() {
                var page = $(this).attr('title');
                swapPage(page);
                //$('#main').load('./content.php');
            });
            
        });
    </script>
        <title>the kth user</title>
    </head>

    <body>
        <div id="container">
            <div id="header">
                <!--<div id="h-left">&nbsp;</div>-->
                <div id="h-center"><h1>
                    <span id="title">
                        the k<sup>th</sup><span id="title2"> user</span>
                    </span>
                </h1></div>
                <div id="h-right">&nbsp;</div>
            </div>
            <div id="nav">
                <div id="nav-button"><li>Navigation &#x25BC;</li></div>
                <!-- research fieldset legend -->
                <!-- highlight current item -->
                <ul id="nav-menu">
                    <!--<li class="oversize">The Reddit Picture Frame</li>
                    <li>Rmas</li>
                    <li>Socially Awkward Mag</li>
                    <li>Skull Society</li>
                    <li>Contact</li>
                    <li>About</li>
                    <li>What's kth?</li>
                    <li>&nbsp;</li>
                    <li>TI-Diablo</li>
                    <li>volunteer</li>
                    <li>freelance</li>
                    <li>work history</li>
                    <li>studies</li>
                    <li>languages</li>
                    <li>linux/sysadmin exp</li>
                    <li>independent projects</li>-->
                    <!--<li onclick="place_content('projects')">Projects</li>-->
                    <li title="projects">Projects</li>
                    <li title="sample_code">Sample Code</li>
                    <li title="contact">Contact</li>
                    <li title="about">About</li>
                </ul>
            </div>
            <div id="main">
                <!--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. -->
                <?php 
                    //$content = file_get_contents('content.php');
                    //echo $content; 
                ?>
            </div>
        </div>
    </body>
</html>
