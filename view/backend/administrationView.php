<?php 
$title = "Administration";
$cssFile = "styleAdministration.css";
ob_start();
?>
<h1>Administration</h1>
<div id="main-content-div"></div>
<nav>
	<div id="menu-bar"></div>
</nav>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>