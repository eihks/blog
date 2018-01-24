<?php $title="Jean Forteroche"; ?>
<?php
	ob_start();
?>

<div id="img-background"></div>
<div id="contenaire_ticket">
<?php
	while($data = $posts->fetch())
	{
?>
	<div class="ticket">
		<a class="a-ticket" href="index.php?action=postpage&id_post=<?= $data['id']; ?> ">
			<div class="contenaire_title_date">
				<p><?= htmlspecialchars($data["title"]); ?> <?= $data["creation_date_fr"]; ?></p>
			</div>
		</a>
	</div>
<?php
	}
?>
</div>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>