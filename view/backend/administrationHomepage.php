<?php 
$title="Administration";
ob_start();
?>

<h1>Bienvenue sur la page d'administration</h1>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>