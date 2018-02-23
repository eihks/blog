<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="public/front-css/<?= $cssFile; ?>" />
			<link rel="stylesheet" href="public/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all" />
			<link rel="stylesheet" href="public/front-css/styleTemplateFront.css" />
			<link rel="icon" type="image/png" href="public/img/favicon.png" />
			<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
			<title> <?= $title ?></title>
		</head>

		<body>
			<div id="cookie-advertissement">
				<p>Les cookies nous permettent de vérifier certaines informations liées au site et de faciliter le partage de données entre les différentes pages, en poursuivant votre navigation vous acceptez leurs utilisations. 
					<a href="https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=fr">Plus d'informations</a>
					<button id="accept-cookie-btn">Accepter</button>
				</p>
			</div>
			<?= $content; ?>
			<script type="text/javascript">
				if(localStorage.getItem("acceptCookie") === "true")
				{
					document.querySelector("#cookie-advertissement").style.display="none";
				}
				else
				{
					document.querySelector("#accept-cookie-btn").addEventListener("click", function(){
						document.querySelector("#cookie-advertissement").style.display ="none";
						localStorage.setItem("acceptCookie", true);
					})
				}
			</script>
		</body>
	</html>