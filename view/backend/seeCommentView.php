<?php
$title = "Administration";
ob_start();
$data = $comment->fetch();
?>

<div id="comment-contenair">
	<div id="comment-administration-contenair">
		<a href="index.php?action=administration&want=deleteComment&comment_id=<?= $data['id']; ?>" title="Supprimer le commentaire" id="delete-comment-btn"><i class="fas fa-trash-alt delete-btn"></i></a>
	</div>
	<div id="comment-date-contenair">
		<p><?= $data["creation_date_fr"]; ?></p>
	</div>
	<div id="comment-content-contenair">
		<p><?= $data["content"]; ?></p>
	</div>
</div>
<script>
	document.querySelector("#delete-comment-btn").addEventListener("click", function(e){
		if(confirm("Voulez-vous vraiment supprimer ce commentaire ?") == false)
		{
			e.preventDefault();
		}
	})
</script>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>