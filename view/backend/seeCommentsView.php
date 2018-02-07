<?php
$title ="Administration";
ob_start();
?>
<div id="comments-contenair">
	<ul>
		<?php
			$i = 0;
		while($datas = $comments->fetch())
		{
			$i++;
		?>
			<li><a href="index.php?action=administration&want=controlComment&comment_id=<?= $datas['id']; ?>">Commentaire N°<?= $i ?></a></li>
		<?php
		}
		?>
	</ul>
</div>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>
