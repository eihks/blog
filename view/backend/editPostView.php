<?php
$title ="Administration";
ob_start();
$data = $post->fetch();
?>
<div id="edit-post">
	<form action="index.php?action=administration&want=editPost&id_post= <?= $data['id']; ?>" method="POST">
		<input type="text" name="title" value="<?= $data['title'] ?>"><br>
		<textarea id="textarea-edit-post" name="content"><?= $data["content"]; ?></textarea>
		<button type="submit" id="btn-update-ticket">Mettre à jour</button>
		<button type="button" id="btn-stop-update">Annuler</button>
	</form>
</div>

<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>