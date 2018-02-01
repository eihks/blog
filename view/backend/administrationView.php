<?php 
$title = "Administration";
$cssFile = "styleAdministration.css";
ob_start();
?>
<div id="page">
	<div id="main-content-div">
		<div id="tickets-list">
			<ul>
				<?php 
				while($data = $posts->fetch())
				{
				?>
				<li><?= $data["title"]; ?></li>
				<?php 
				}
				?>
		</div>
			
	</div>
		<div id="menu-bar">
			<ul>
				<li>Retourner sur la page d'accueil du blog</li>
				<li id="tickets-button">Mes tickets</li>
				<li id="comments-button">Gérer les commentaires</li>
			</ul>
		</div>
</div>
<script src="public/adaptativeContent.js"></script>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>