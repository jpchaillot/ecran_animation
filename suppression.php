<?php





if(!isset($_GET['fichier'])){
    header('Location: index.php');
}

exec('rm ./video/'.$_GET['fichier']);
exec('rm ./video/\''.$_GET['fichier'].'\'');

header('Location: index.php');
