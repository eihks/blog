<?php
$title ="Administration";
ob_start();
$data = $comment->fetch();
?>

<div id="edit-comment">
	<form action="index.php?action=administration&want=editComment&comment_id= <?= $data['id']; ?>" method="POST">
		<textarea id="textarea-edit-comment" class="admin-editor" name="content"><?= $data["content"]; ?></textarea>
		<button type="submit" id="btn-update-comment">Mettre à jour</button>
		<a href="index.php?action=administration&want=seeComments"><button type="button" id="btn-stop-update">Annuler</button></a>
	</form>
</div>

<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>