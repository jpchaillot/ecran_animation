<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin jpc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container text-center" style="padding-top: 10em;">
    <div class="panel panel-default">
        <div class="panel-header">
            <h1>Administration Video</h1>
        </div>
        <div class="panel-body">
            <form class="horizontal-form" action="envoi.php" method="post">
                <div class="form-group">
                    <strong>Enter video URL Copier l'URL d'une video Youtube</strong>
                </div>
                <div class="form-group">
                    <input title="Video ID" name="video_url" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <span>Puis appuyer sur  <code>Enter</code> Pour valider</span>
                </div>
            </form>
            <p>

            </p>
        </div>
    </div>
</div>

<div>
    <form method="POST" enctype="multipart/form-data">
        <input type ="file" name="upload_file"/> <br> <br/>
        <input type ="submit" name="submit"/>
    </form>
    
    <?php   

    $chemin_destination = $chemin_site . '/boot/video/';

    if ((isset($_FILES['upload_file']['tmp_name'])&&($_FILES['upload_file']['error'] == UPLOAD_ERR_OK))) {  
        
        $temp = move_uploaded_file($_FILES['upload_file']['tmp_name'], $chemin_destination.$_FILES['upload_file']['name']);
        }     
    ?>
</div>





<div id="dossier-video" align="center">
	<table >
	<?php 
    $nb_fichier = 0;
    if($dossier = opendir('/boot/video/')){
    while(false !== ($fichier = readdir($dossier))){
        if($fichier != '.' && $fichier != '..' && $fichier != 'index.php'){
            $nb_fichier++; // On incr�mente le compteur de 1
     ?>
     	<tr>
     		<td>
     			<a href="./video/<?= $fichier ?>"> <?= $fichier ?> </a>
     		</td>
     		<td>
     			<a type="button" class="btn btn-danger" href="suppression.php?fichier=<?= $fichier ?>">Supprimer</a>
     		</td>
     	</tr>
 	<?php }
        }}
        ?>
 
	</table>


<?php 
echo '</ul><br />';
echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';

closedir($dossier);

?>


</div>









</body>
</html>





