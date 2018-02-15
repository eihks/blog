<?php
$title ="Administration";
ob_start();
if(isset($_GET["id_post"]))
{
$data = $post->fetch();
?>
<div id="edit-post">
	<form action="index.php?action=administration&want=editPost&id_post= <?= $data['id']; ?>" method="POST">
		<label class="label-title-input">Titre du ticket<br><input id="input-title" type="text" name="title" value="<?= $data['title'] ?>"></label><br>
		<textarea id="textarea-edit-post" name="content" class="mceEditor"><?= nl2br($data["content"]); ?></textarea>
		<button type="submit" id="btn-update-ticket">Mettre à jour</button>
		<a href="index.php?action=administration&want=seePosts"><button type="button" id="btn-cancel">Annuler</button></a>
	</form>
</div>
<?php
}
else
{
?>
<form action="index.php?action=administration&want=newPost" method="POST">
	<label class="label-title-input">Titre du ticket<br><input id="input-title" type="text" name="title"></label><br>
	<textarea id="textarea-edit-post" class="mceEditor" name="content"></textarea>
	<button type="submit" id="btn-update-ticket">Mettre en ligne</button>
	<a href="index.php?action=administration&want=seePosts"><button type="button" id="btn-cancel">Annuler</button></a>
<?php
}
$content = ob_get_clean();
require("view/backend/template.php");
?>
<script type="text/javascript">
	var btnsCancel = document.querySelectorAll("#btn-cancel");
	for(var i=0; i < btnsCancel.length; i++)
	{
		btnsCancel[i].addEventListener("click", function(e){
			if(confirm("Voulez-vous vraiment annuler l'édition ?") == false)
			{
				e.preventDefault();
			}
		})
	}
</script>