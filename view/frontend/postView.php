<?php $title = "test";
ob_start();
 ?>
<div id="contenaire_ticket">
<?php
	$data = $post->fetch();
?>
	<div class="ticket">
			<div class="contenaire_title_date">
				<p><?= htmlspecialchars($data["title"]); ?> <?= $data["creation_date_fr"]; ?></p>
			</div>
	</div>
<a href="index.php?action=homepage">Retour à la page d'accueil</a>
</div>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>