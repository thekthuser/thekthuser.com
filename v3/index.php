<html>
    <head>
    <link href="reset.css" type="text/css" rel="stylesheet" />
    <link href="style.css" types="text/css" rel="stylesheet" />
    <link href="kth24.ico" type="image/png" rel="icon" />
    <script src="http://use.edgefonts.net/inconsolata.js"></script>
    <script type="text/javascript">
        function drop_nav() {
            document.getElementById("nav-menu").style.display="block";
            document.getElementById("nav-button").style.background="#222222";
            document.getElementById("nav-button").style.color="#DAA520";
        }
        function retract_nav() {
            document.getElementById("nav-menu").style.display="none";
            document.getElementById("nav-button").style.background="#DAA520";
            document.getElementById("nav-button").style.color="#222222";
        }
        function place_content(topic) {
            var main = document.getElementById("main");
                <?php //$content = "projects"; ?>
                <?php $content = file_get_contents('test'); ?>
                if (topic == 'projects') {
                    var content = <?php echo $content; ?>;
                } else {
                    var content = "other";
                }
            main.innerHTML=content;
            }
            
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
                <div id="nav-button" onmouseenter="drop_nav()" 
                ><li>Navigation &#x25BC;</li></div>
                <!-- research fieldset legend -->
                <!-- highlight current item -->
                <ul id="nav-menu" onmouseleave="retract_nav()">
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
                    <li onclick="place_content('projects')">Projects</li>
                    <li onclick="place_content('code')">Sample Code</li>
                    <li>Contact</li>
                    <li>About</li>
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
