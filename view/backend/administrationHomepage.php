<?php 
$title="Administration";
ob_start();
?>

<h1 id="h1-homepage">Bienvenue sur la page d'administration</h1>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>