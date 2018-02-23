<?php 
$title="Jean Forteroche";
$cssFile = "styleHomepage.css";
ob_start();
?>

<div id="img-background"></div>
<div id="main-summarize">
<?php
if($_GET["page"] > 1)
{
?>
<script>
	document.querySelector("#main-summarize").style.display="none";
</script>
<?php
}
?>
	<h1>Bienvenue sur mon blog !</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fermentum nibh at tempor gravida. Praesent tempor arcu dui. Curabitur vitae vehicula nunc, non vulputate ex. Suspendisse potenti. Morbi fringilla ligula non massa fringilla cursus. Nullam condimentum lectus et quam commodo, in pellentesque libero imperdiet. Maecenas vitae arcu et urna faucibus pretium at id dui.</p>

	<p>Suspendisse viverra ipsum sit amet nisl venenatis, eu mollis mi bibendum. Nulla a diam vitae nibh posuere lacinia id a neque. Curabitur hendrerit ex iaculis, rutrum erat quis, dignissim dui. Ut bibendum interdum leo, at consectetur dui egestas nec. Mauris ac varius diam. Integer commodo porttitor congue. Vivamus placerat quam quis quam tristique tempus. Nunc sit amet egestas arcu. Donec ac nisl ac nulla bibendum feugiat. Quisque odio nulla, suscipit ut ipsum eu, congue cursus turpis.</p>

	<p>Vestibulum sit amet nunc aliquam, iaculis justo at, euismod odio. Maecenas in leo sed enim varius viverra. Quisque sit amet ex ipsum. Etiam tempor neque eu risus euismod egestas. Vivamus tempor, metus id dignissim gravida, lacus metus eleifend erat, ac cursus justo orci auctor ex. Nullam maximus.</p>	
</div>
<div id="contenaire_ticket">
<?php
	while($data = $posts->fetch())
	{
?>
	<div class="ticket">
		<a class="a-ticket" href="index.php?action=postpage&title=<?= $data['title'] ?>&id_post=<?= $data['id']; ?> ">
			<h2><?= $data["title"]; ?></h2>
			<span class="text">
				<p><?= substr(strip_tags($data["content"]), 0, 500) . "..."; ?></p>
			</span>
			<div id="contenair-credit"><div class="author"><p><?= $data["author"]; ?></p></div><div class ="date"><p><?= $data["creation_date_fr"]; ?></p></div></div>
		</a>
	</div>
<?php
	}
?>
</div>
<div id="contenaire-link-page">
	<?php
	if($_GET["page"] > 1)
	{
		$lastPage = $_GET["page"] -1;
		echo "<a href='index.php?action=homepage&page=$lastPage' title='Page précédente'>Page précédente</a>";
	}
	if($_GET["page"] < $totalPage)
	{
		$nextPage = $_GET["page"] +1;
		echo "<a href='index.php?action=homepage&page=$nextPage' title='Page suivate'>Page suivante</a>";
	}
	?>
</div>
<?php
$content = ob_get_clean();
require("view/frontend/template.php");
?>