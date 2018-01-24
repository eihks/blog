<?php $title = "test";
ob_start();
 ?>
<div id="contenaire_ticket">
<?php
	$data = $post->fetch();
?>
	<div class="ticket">
			<div class="contenaire_title_date">
				<p><?= htmlspecialchars($data["title"]); ?> <?= htmlspecialchars($data["creation_date_fr"]); ?></p>
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
			<p><?php echo htmlspecialchars($datas["creation_date_fr"]) . "<br>" . htmlspecialchars($datas["content"]); ?></p>
			<a href="index.php?action=reportcomment&id_post=<?= $_GET['id_post']; ?>&id=<?= $datas['id']; ?>" ><i class="fa fa-exclamation" aria-hidden="true"></i></a>
		</div>
</div>
<?php
}
$content = ob_get_clean();
require("view/frontend/template.php");
?>