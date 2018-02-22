<?php 
$title="Administration";
$cssFile ="styleHomepage.css";
ob_start();
$dataP = $post->fetch();
?>

<a href="index.php?action=administration&want=newPost"><button type="button" id="btn-new-post">Nouveau Ticket</button></a>
<h1 id="h1-homepage">Bienvenue sur la page d'administration</h1>
<div id="last-post">
	<div class="ticket">
		<h2>Dernier ticket
			<span>
				<a href="index.php?action=administration&want=editPost&id_post=<?= $dataP['id']; ?>" title="Editer le ticket"><i class="fas fa-edit edit-ico fa-xs"></i></a>
				<a href="index.php?action=administration&want=deletePost&id_post=<?= $dataP['id']; ?>" title="Supprimer le ticket"><i class="fas fa-trash-alt delete-ico fa-xs"></i></a>
			</span>
		</h2>
		<a class="a-ticket" href="index.php?action=postpage&title=<?= $dataP['title'] ?>&id_post=<?= $dataP['id']; ?> ">
			<span class="title"><h2><?= $dataP["title"]; ?></h2></span>
			<span class="text"><p><?= substr($dataP["content"], 0,500) . "..."; ?></p></span>
			<span class="author"><p><?= $dataP["author"]; ?></p></span>
			<span class ="date"><p><?= $dataP["creation_date_fr"]; ?></p></span>
			<span class="total-visit" title="Vue(s)"><p><i class="fas fa-eye total-visit-ico"></i><?= $dataP["total_visit"]; ?></p></span>
		</a>
	</div>
</div>

<table id="last-comment-table">
	<h2 id="title-last-comment">Derniers Commentaire</h2>
		<?php
			$i = 0;
			while($dataC = $comments->fetch())
			{
				if($i%2 == 0)
				{
					$color = "#eef5fc";
				}
				else
				{
					$color = "white";
				}
				$i++;
		?>
				<tr style="background-color : <?= $color; ?>">
					<th class="th-table-lastC"><?= $dataC["creation_date_fr"]; ?></th>
					<th class="th-table-lastC"><a href="index.php?action=postpage&id_post=<?= $dataC['id_post']; ?>"><?= $dataC["content"]; ?></a></th>
					<th class="th-table-lastC">
						<span>
							<a href="index.php?action=administration&want=deleteComment&comment_id=<?= $dataC['id']; ?>" title="Supprimer le commentaire" id="delete-comment-btn"><i class="fas fa-trash-alt delete-ico fa-xs"></i></a>
							<a href="index.php?action=administration&want=editComment&comment_id=<?= $dataC['id']; ?>" title="Editer le commentaire" id="edit-comment-btn"><i class="fas fa-edit edit-ico fa-xs"></i></a>
							<a href="index.php?action=administration&want=confirmComment&comment_id=<?= $dataC['id']; ?>" title="Valider le commentaire" id="confirm-comment-btn"><i class="fas fa-check-circle confirm-ico fa-xs"></i></a>
						</span>
					</th>
		<?php
			}
		?>
	<p><a href="index.php?action=postpage&id_post=<?= $dataC['id_post']; ?>"><?= $dataC["content"]; ?></a></p>
</table>
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

	document.querySelector(".delete-ico").addEventListener("click", function(e){
		if(confirm("Attention cette action est définitive, voulez-vous vraiment supprimer ce ticket ?") == false){
			e.preventDefault();
		}
	})
</script>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>