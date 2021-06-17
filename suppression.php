<?php





if(!isset($_GET['fichier'])){
    header('Location: index.php');
}

exec('rm /var/www/html/video/'.$_GET['fichier']);
exec('rm /var/www/html/video/\''.$_GET['fichier'].'\'');

header('Location: index.php');
