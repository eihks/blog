<?php
$title ="Administration";
ob_start();
if(isset($_GET["id_post"]))
{
$data = $post->fetch();
?>
<div id="edit-post">
	<form action="index.php?action=administration&want=editPost&id_post= <?= $data['id']; ?>" method="POST">
		<label>Titre du ticket<br><input id="input-title" type="text" name="title" value="<?= $data['title'] ?>"></label><br>
		<textarea id="textarea-edit-post" name="content" class="mceEditor"><?= nl2br($data["content"]); ?></textarea>
		<button type="submit" id="btn-update-ticket">Mettre à jour</button>
		<button type="button" id="btn-stop-update">Annuler</button>
	</form>
</div>
<?php
}
else
{
?>
<form action="index.php?action=administration&want=newPost" method="POST">
	<label>Titre du ticket<br><input id="input-title" type="text" name="title"></label><br>
	<textarea id="textarea-edit-post" class="mceEditor" name="content"></textarea>
	<button type="submit" id="btn-update-ticket">Mettre en ligne</button>
	<button type="button" id="btn-stop-update">Annuler</button>
<?php
}
$content = ob_get_clean();
require("view/backend/template.php");
?>