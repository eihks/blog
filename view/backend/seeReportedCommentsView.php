<?php
$title ="Administration";
$cssFile = "styleCommentsList.css";
ob_start();
?>
<div id="comments-contenair">
	<ul>
		<?php
		if($_GET["page"] == 1)
		{
			$i = 0;
		}
		else
		{
			$i = $commentsPerPage * $_GET["page"] -$commentsPerPage;
		}
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
				<p class="p-relative-post">Ticket relatif <?= $datas["post_name"]; ?></p>
				<span>
					<a href="index.php?action=administration&want=deleteComment&comment_id=<?= $datas['id']; ?>" title="Supprimer le commentaire" id="delete-comment-btn"><i class="fas fa-trash-alt delete-ico"></i></a>
					<a href="index.php?action=administration&want=editComment&comment_id=<?= $datas['id']; ?>" title="Editer le commentaire" id="edit-comment-btn"><i class="fas fa-edit edit-ico"></i></a>
					<a href="index.php?action=administration&want=confirmComment&comment_id=<?= $datas['id']; ?>" title="Valider le commentaire" id="confirm-comment-btn"><i class="fas fa-check-circle confirm-ico"></i></a>
				</span>
			</li>
		<?php
		}
		?>
	</ul>
</div>
<?php
$nextPage = $_GET["page"] +1;
$lastPage = $_GET["page"] -1;
if($_GET["page"] > 1)
{
	echo "<a href='index.php?action=administration&want=seeReportedComments&page=$lastPage'>Page précédente</a>";
}

if($_GET["page"] < $totalPage)
{
	echo "<a href='index.php?action=administration&want=seeReportedComments&page=$nextPage'>Page suivante</a>";
}
?>
<script type="text/javascript">
	document.querySelector("#confirm-comment-btn").addEventListener("click", function(e){
		if(confirm("Souhaitez-vous vraiment valider le commentaire ? Après confirmation ce commentaire n'apparaitra plus comme signaler. \n Continuer ?") == false)
		{
			e.preventDefault();
		}
	})

	document.querySelector("#delete-comment-btn").addEventListener("click", function(e){
		if(confirm("Attention cette action est définitive, voulez-vous vraiment supprimer ce commentaire ?") == false)
		{
			e.preventDefault();
		}
	})
</script>
<?php
if($i === 0)
{
	echo "<h2 style='text-align : center;'> Aucun commentaire signalé</h2>";
}
$content = ob_get_clean();
require("view/backend/template.php");
?>
