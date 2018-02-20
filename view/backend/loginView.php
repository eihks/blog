<?php 
$title ="Administration";
ob_start();
?>
<form action="index.php?action=administration" method="POST">
	<label>Mot de passe :<input type="password" name="password"></label>
</form>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>
