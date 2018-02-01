<?php 
$title = "Administration";
$cssFile = "public/styleAdministration.css";
ob_start();
?>
<h1>Administration</h1>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>