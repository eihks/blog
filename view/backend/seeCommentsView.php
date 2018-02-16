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
			if($i%2 == 0)
			{
				$color = "white";
			}
			else
			{
				$color = "#eef5fc";
			}
		?>
			<li style="background-color : <?= $color; ?>">
				<a href="index.php?action=postpage&id_post=<?= $datas['id_post']; ?>">Commentaire N°<?= $i ?></a>
				<p class="p-Nreport">Signalements : <?= $datas["report_level"] ?></p>
				<span>
					<a href="index.php?action=administration&want=deleteComment&comment_id=<?= $datas['id']; ?>" title="Supprimer le commentaire" id="delete-comment-btn"><i class="fas fa-trash-alt delete-btn"></i></a>
					<a href="index.php?action=administration&want=editComment&comment_id=<?= $datas['id']; ?>" title="Editer le commentaire" id="edit-comment-btn"><i class="fas fa-edit"></i></a>
					<a href="index.php?action=administration&want=confirmComment&comment_id=<?= $datas['id']; ?>" title="Valider le commentaire" id="confirm-comment-btn"><i class="fas fa-check-circle"></i></a>
				</span>
			</li>
		<?php
		}
		?>
	</ul>
</div>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>
