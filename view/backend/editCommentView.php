<?php
$title ="Administration";
ob_start();
$data = $comment->fetch();
?>

<div id="edit-comment">
	<form action="index.php?action=administration&want=editComment&comment_id= <?= $data['id']; ?>" method="POST">
		<textarea id="textarea-edit-comment" name="content"><?= $data["content"]; ?></textarea>
		<button type="submit" class="btn-update">Mettre à jour</button>
		<a href="index.php?action=administration&want=seeComments"><button type="button" class="btn-cancel">Annuler</button></a>
	</form>
</div>

<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>

<script type="text/javascript">
	var btnCancel = document.querySelector(".btn-cancel");
		btnCancel.addEventListener("click", function(e){
			if(confirm("Voulez-vous vraiment annuler l'édition ?") == false)
			{
				e.preventDefault();
			}
		})

	document.querySelector(".btn-update").addEventListener("click", function(e){
		if(confirm("Voulez-vous vraiment confirmer la modification de ce commentaire ? Après validation ce commentaire n'apparaitra plus comme un commentaire signalé. \nContinuer ?") == false)
		{
			e.preventDefault();
		}
	})
</script>