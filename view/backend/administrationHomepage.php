<?php 
$title="Administration";
ob_start();
?>

<h1 id="h1-homepage">Bienvenue sur la page d'administration</h1>
<a href="index.php?action=administration&want=newPost"><button type="button" id="btn-new-post">Nouveau Ticket</button></a>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>