<?php 
$title = "Administration";
$cssFile = "styleAdministration.css";
ob_start();
?>
<div id="page">
	<div id="main-content-div">
		<?php 
		if(isset($_GET["id_post"]))
		{
			$data = $post->fetch();
			echo $data["id"];
		?>
		<div id="edit-post">
			<form action="index.php?action=updatePost&id_post= <?= $data['id']; ?>" method="POST">
				<input type="text" name="title" value="<?= $data['title'] ?>"><br>
				<textarea id="textarea-edit-post" name="content"><?= $data["content"]; ?></textarea>
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