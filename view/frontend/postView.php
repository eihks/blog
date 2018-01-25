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

<div id="contenaire-comments">
<?php 
while($datas = $comms->fetch())
{
?>
	<div id="contenaire-comments">
		<p><?php echo $datas["creation_date_fr"] . "<br>" . $datas["content"]; ?></p>
		<a href="index.php?action=reportcomment&id_post=<?= $_GET['id_post']; ?>&id=<?= $datas['id']; ?>" ><i class="fa fa-exclamation" aria-hidden="true"></i></a>
	</div>
</div>
<?php
}
?>
<form method="POST" action="index.php?action=newcomment&id_post=<?= $_GET['id_post']; ?> ">		
	<p>
		<label>Poster un commentaire :<textarea name="content"></textarea></label>
	</p>
	<input type="submit" value="Envoyer">
</form>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>