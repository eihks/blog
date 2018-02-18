<?php 
$title="Administration";
ob_start();
$dataP = $post->fetch();
$dataC = $comment->fetch();
?>

<h1 id="h1-homepage">Bienvenue sur la page d'administration</h1>
<a href="index.php?action=administration&want=newPost"><button type="button" id="btn-new-post">Nouveau Ticket</button></a>
<div id="last-post">
	<div class="ticket">
		<a class="a-ticket" href="index.php?action=postpage&title=<?= $dataP['title'] ?>&id_post=<?= $dataP['id']; ?> ">
			<h2>Dernier ticket</h2>
			<span class="title"><h2><?= $dataP["title"]; ?></h2></span>
			<span class="text"><p><?= $dataP["content"]; ?></p></span>
			<span class="author"><p><?= $dataP["author"]; ?></p></span>
			<span class ="date"><p><?= $dataP["creation_date_fr"]; ?></p></span>
		</a>
	</div>
</div>

<div id="last-comment">
	<h2>
		Dernier Commentaire
		<span>
			<a href="index.php?action=administration&want=deleteComment&comment_id=<?= $dataC['id']; ?>" title="Supprimer le commentaire" id="delete-comment-btn"><i class="fas fa-trash-alt delete-ico fa-xs"></i></a>
			<a href="index.php?action=administration&want=editComment&comment_id=<?= $dataC['id']; ?>" title="Editer le commentaire" id="edit-comment-btn"><i class="fas fa-edit edit-ico fa-xs"></i></a>
			<a href="index.php?action=administration&want=confirmComment&comment_id=<?= $dataC['id']; ?>" title="Valider le commentaire" id="confirm-comment-btn"><i class="fas fa-check-circle confirm-ico fa-xs"></i></a>
		</span>
	</h2>
	<p><a href="index.php?action=postpage&id_post=<?= $dataC['id_post']; ?>"><?= $dataC["content"]; ?></a></p>
</div>
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
$content = ob_get_clean();
require("view/backend/template.php");
?>