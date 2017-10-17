<?php 
require_once 'Autoloader.php';
Autoloader::register();

echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';

$form = new HTML\BootstrapForm();

?>

<div class="starter-template" style="padding-top: 100px;">
	<form method="post">
		<?= $form->input('nom','adresse de la video youtube');?>
		<?= $form->submit();?>
	</form>

</div>

<?php 
var_dump($_POST);

if (isset($_POST["nom"])){
    echo 'salut';
    var_dump ( 'youtube-dl '.$_POST['nom']);
    echo exec ( 'youtube-dl '.$_POST['nom'] );
}
?>