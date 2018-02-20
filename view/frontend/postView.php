<?php $title = $_GET["title"];
$cssFile = "stylePostView.css";
ob_start();
 ?>
<div id="contenaire_ticket">
<?php
	$data = $post->fetch();
?>
	<div class="ticket">
		<span class="title"><h1><?= $data["title"]; ?></h1></span>
		<span class="text"><p><?= $data["content"]; ?></p></span>
		<span class="author"><p><?= $data["author"]; ?></p></span>
		<span class ="date"><p><?= $data["creation_date_fr"]; ?></p></span>
	</div>
</div>

<div id="contenaire-comments">
	<h2>Commentaires :</h2>	
<?php 
while($datas = $comms->fetch())
{
?>
	<p><?php echo htmlspecialchars($datas["creation_date_fr"]) ?>
		<a class="report-comment" title="Signaler le commentaire" href="index.php?action=reportcomment&title=<?= $_GET['title']; ?>&id_post=<?= $_GET['id_post']; ?>&id=<?= $datas['id']; ?>" >
			<i class="fa fa-exclamation" aria-hidden="true"></i>
		</a>
	</p>
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
	<form id="form-post-comment" method="POST" action="index.php?action=newcomment&id_post=<?= $_GET['id_post']; ?> ">		
		<p>
			<label>Poster un commentaire :<br><textarea name="content" id="txt-area-comment"></textarea></label>
		</p>
		<input type="submit" value="Envoyer">
	</form>
	<a href="index.php?action=homepage" class="btn-back-homepage">Retour à la page d'accueil</a>	
</div>

<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>