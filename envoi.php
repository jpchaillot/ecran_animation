<?php

set_time_limit(0);

if(!isset($_POST['video_url'])){
    header('Location: index.php');
}

shell_exec("youtube-dl -f best -o '/boot/video/%(title)s-%(id)s.%(ext)s' ".$_POST['video_url']);


//var_dump($_POST);
//die;




header('Location: index.php');

