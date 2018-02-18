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
	<h2>Dernier Commentaire</h2>
	<p><a href="index.php?action=postpage&id_post=<?= $dataC['id_post']; ?>"><?= $dataC["content"]; ?></a></p>
</div>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>