<?php

set_time-limit(0);

if(!isset($_POST['video_url'])){
    header('Location: index.php');
}

shell_exec("youtube-dl -o '/var/www/html/video/%(title)s.%(ext)s' ".$_POST['video_url']);


//var_dump($_POST);
//die;




header('Location: index.php');

