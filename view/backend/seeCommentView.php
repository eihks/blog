<?php
$title = "Administration";
ob_start();
$data = $comment->fetch();
?>

<div id="comment-contenair">
	<div id="comment-administration-contenair">
		<a href="" title="Supprimer le commentaire"><i class="fas fa-trash-alt delete-btn"></i></a>
	</div>
	<div id="comment-date-contenair">
		<p><?= $data["creation_date_fr"]; ?></p>
	</div>
	<div id="comment-content-contenair">
		<p><?= $data["content"]; ?></p>
	</div>
</div>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>