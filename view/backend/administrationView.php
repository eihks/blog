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
			<form action="index.php?action=updatePost" method="POST">
				<textarea id="textarea-edit-post"><?= $data["content"]; ?></textarea>
				<button type="submit" id="btn-update-ticket">Mettre à jour</button>
				<button type="button" id="btn-stop-update">Annuler</button>
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
				<li><a href="index.php?action=administration&id_post=<?= $data['id']; ?>"><?= $data["title"]; ?></a></li>
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