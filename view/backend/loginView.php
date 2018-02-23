<?php 
$title ="Administration";
$cssFile = "styleLogin.css";
ob_start();
?>
<h1>Accéder à l'administration</h1>
<form action="index.php?action=administration" method="POST">
	<label>Mot de passe :<input type="password" name="password"></label>
</form>
<a href="index.php?action=homepage&page=1">Retourner sur la page d'accuei du blog</a>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>
