<?php
$title = "Administration";
ob_start();
?>
<div id="posts-list">
	<button type="button" id="btn-new-post">Nouveau Ticket</button>
	<ul>
		<?php 
		while($data = $posts->fetch())
		{
		?>
		<li><a href="index.php?action=administration&want=editPost&id_post=<?= $data['id']; ?>"><?= $data["title"]; ?><i class="fas fa-edit"></i></a></li>
		<?php 
		}
		?>
	</ul>
</div>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>