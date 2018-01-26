<?php $title = "test"; ?>
<?php $cssFile = "stylePostView.css"; ?>
<?php
ob_start();
 ?>
<div id="contenaire_ticket">
<?php
	$data = $post->fetch();
?>
	<div class="ticket">
		<span class="title"><h1><?= htmlspecialchars($data["title"]); ?></h1></span>
		<span class="text"><p><?= nl2br(htmlspecialchars($data["content"])); ?></p></span>
		<span class="author"><p><?= htmlspecialchars($data["author"]); ?></p></span>
		<span class ="date"><p><?= htmlspecialchars($data["creation_date_fr"]); ?></p></span>
	</div>
</div>

<div id="contenaire-comments">
	<h2>Commentaires :</h2>	
<?php 
while($datas = $comms->fetch())
{
?>
	<p><?php echo htmlspecialchars($datas["creation_date_fr"]) ?><a class="report-comment" title="Signaler le commentaire" href="index.php?action=reportcomment&id_post=<?= $_GET['id_post']; ?>&id=<?= $datas['id']; ?>" ><i class="fa fa-exclamation" aria-hidden="true"></i></a></p>
	<p class="text-comment"><?= htmlspecialchars($datas["content"]); ?></p>
<?php
}
if(isset($_SESSION["alreadyReported"]))
{
	if($_SESSION["alreadyReported"] === true)
	{
?>
<script>
	alert("Commentaire déjà signalé !");
</script>
<?php
	$_SESSION["alreadyReported"] = false;
	}
}
?>
</div>
<form id="form-post-comment" method="POST" action="index.php?action=newcomment&id_post=<?= $_GET['id_post']; ?> ">		
	<p>
		<label>Poster un commentaire :<br><textarea name="content" cols="50" rows="10"></textarea></label>
	</p>
	<input type="submit" value="Envoyer">
</form>
<a href="index.php?action=homepage">Retour à la page d'accueil</a>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>