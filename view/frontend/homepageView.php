<?php 
$title="Jean Forteroche";
$cssFile = "style.css";
?>
<?php
	ob_start();
?>

<div id="img-background"></div>
<div id="main-summarize">
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
			<h2><?= htmlspecialchars($data["title"]); ?></h2>
			<span class="text"><p><?= substr(htmlspecialchars($data["content"]), 0, 500) . "..."; ?></p></span>
			<span class="author"><p><?= $data["author"]; ?></p></span><span class ="date"><p><?= $data["creation_date_fr"]; ?></p></span>
		</a>
	</div>
<?php
	}
?>
</div>
<?php
for($i =1; $i <= $totalPage; $i++)
{
	echo "<a href='index.php?action=homepage&page=$i'>". $i ."</a>";
}
$content = ob_get_clean();
require("view/frontend/template.php");
?>