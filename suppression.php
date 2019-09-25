<?php





if(!isset($_GET['fichier'])){
    header('Location: index.php');
}

exec('rm /boot/video/'.$_GET['fichier']);
exec('rm /boot/video/\''.$_GET['fichier'].'\'');

header('Location: index.php');
