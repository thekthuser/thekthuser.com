<?php
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, 'http://www.reddit.com/r/pics.json');
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, True);
    $ret = curl_exec($curl_handle);
    curl_close($curl_handle);

    $json = json_decode($ret, True);

    //imgur api - https://api.imgur.com/2/image/:HASH.json

    $entries;
    /**foreach($json['data']['children'] as $entry) {
        $entries[$entry['title']] = $entry['url'];
    }*/
    for ($i = 0; $i < count($json['data']['children']); $i++) {
        $entries[$i]['title'] = $json['data']['children'][$i]['data']['title'];
        $entries[$i]['url'] = $json['data']['children'][$i]['data']['url'];
    }
    shuffle($entries);

?>

<html>
    <head>
        <title>r/pics/frame</title>
        <script type="text/javascript" src=
        "http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var entries = <?php echo json_encode($entries); ?>;
            var current = 0;

            setInterval(function() {
                //$('#title').html(current);
                $('#title').html(entries[current].title + ' ' +current);
                $('#image').attr('src', entries[current].url);
                $('#url').attr('href', entries[current].url).html(entries[current].url);
                current++;
            }, 50000);

        });
        </script>
    </head>
    <body>
        <center id='title'></center>
        <center><img id='image' width='auto' height='auto'></img></center>
        <center><a id='url'></a></center>
        <?php 
            //echo count($entries);
            //echo $entries[2]['title'];
        ?>
    </body>
</html>
