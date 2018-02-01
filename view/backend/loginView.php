<?php 
$title ="Administration";
$cssFile = "";
ob_start();
?>
<form action="index.php?action=administration" method="POST">
	<input type="password" name="password">
</form>
<?php
$content = ob_get_clean();
?>
