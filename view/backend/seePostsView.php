<?php
$title = "Administration";
$cssFile = "stylePostsList.css";
ob_start();
?>
<div id="posts-list">
	<a href="index.php?action=administration&want=newPost"><button type="button" id="btn-new-post">Nouveau Ticket</button></a>
	<ul>
		<?php
		$i = 0; 
		while($datas = $posts->fetch())	
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
			<span>
				<a href="index.php?action=administration&want=editPost&id_post=<?= $datas['id']; ?>" title="Editer le ticket"><?= $datas["title"]; ?></a>
				<span class="total-visit" title="Vue(s)"><i class="fas fa-eye total-visit-ico"></i><?= $datas["total_visit"]; ?></span>
			</span>
			<span>
				<a href="index.php?action=administration&want=editPost&id_post=<?= $datas['id']; ?>" title="Editer le ticket"><i class="fas fa-edit edit-ico"></i></a>
				<a href="index.php?action=administration&want=deletePost&id_post=<?= $datas['id']; ?>" title="Supprimer le ticket"><i class="fas fa-trash-alt delete-ico">	</i>
				</a>
			</span>
		</li>
		<?php 
		}
		?>
	</ul>
	<?php
	if($_GET["page"] > 1)
	{
		$lastPage = $_GET["page"] -1;
		echo "<a href='index.php?action=administration&want=seePosts&page=$lastPage' title='Page précédente'>Page précédente</a>";
	}
	if($_GET["page"] < $totalPage)
	{
		$nextPage = $_GET["page"] +1;
		echo "<a href='index.php?action=administration&want=seePosts&page=$nextPage' title='Page suivate'>Page suivante</a>";
	}
	?>
	<script>
		var deleteBtns = document.querySelectorAll(".delete-btn");
		for(var i=0; i < deleteBtns.length; i++)
		{
			deleteBtns[i].addEventListener("click", function(e){
				if(confirm("Attention cette action est définitive, voulez-vous vraiment supprimer ce ticket <?= $datas['id'] ?> ?") == false){
					e.preventDefault();
				}
			})
		}
	</script>
</div>
<?php
$content = ob_get_clean();
require("view/backend/template.php");
?>