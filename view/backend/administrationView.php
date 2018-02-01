<?php 
$title = "Administration";
$cssFile = "styleAdministration.css";
ob_start();
?>
<div id="page">
	<div id="main-content-div">
		<?php 
		if(isset($_GET["want"]) AND isset($_GET["id_post"]) AND $_GET["want"] === "editPost")
		{
			$data = $post->fetch();
		?>
		<div id="edit-post">
			<form action="#" method="POST">
				<textarea id="textarea-edit-comment"><?= $data["content"]; ?></textarea>
			</form>
		</div>
		<?php
		}
		?>
		<div id="tickets-list">
			<ul>
				<?php 
				while($data = $posts->fetch())
				{
				?>
				<li><a href="index.php?action=administration&want=editPost&id_post=<?= $data['id']; ?>"><?= $data["title"]; ?></a></li>
				<?php 
				}
				?>
			</ul>
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