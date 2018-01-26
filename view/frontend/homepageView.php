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
			<h2><?= htmlspecialchars($data["title"]); ?></h2>
			<span class="text"><p><?= substr(htmlspecialchars($data["content"]), 0, 500) . "..."; ?></p></span>
			<span class="author"><p><?= $data["author"]; ?></p></span><span class ="date"><p><?= $data["creation_date_fr"]; ?></p></span>
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