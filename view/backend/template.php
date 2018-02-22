<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="public/back-css/<?= $cssFile; ?>" />
			<link rel="stylesheet" href="public/back-css/styleTemplate.css" />
			<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
			<link rel="stylesheet" href="public/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all">
			<script type="text/javascript" src="public/tinymce/js/tinymce/tinymce.min.js"></script>
			<script type="text/javascript">
			  tinyMCE.init({
			    mode : "textareas",
			    editor_selector : "mceEditor",
			    width : "99%",
			    branding : false
			  });
			  </script>
			<title><?= $title; ?></title>
		</head>

		<body>
			<div id="page">
				<div id="top">
					<h1>Jean Forteroche</h1>
					<h2>Administration</h2>
				</div>
				<div id="main-content-div">
					<?= $content; ?>
				</div>

				<div id="menu-bar">
					<div class="contenair-menu-el headband">
						<p>Navigation principale</p>
					</div>

					<div class="contenair-menu-el">
						<a href="index.php?action=administration" class="a-menu-bar">
							<i class="fas fa-chart-bar icon-menu-bar"></i>Tableau de bord
						</a>
					</div>

					<div class="contenair-menu-el">
						<a href="index.php" class="a-menu-bar">
							<i class="far fa-circle icon-menu-bar"></i>Retourner sur la page d'accueil du blog
						</a>
					</div>

					<div class="contenair-menu-el">
						<a href="index.php?action=administration&want=seePosts" class="a-menu-bar">
							<i class="fas fa-clipboard icon-menu-bar"></i>Mes tickets
						</a>
					</div>

					<div id="contenair-comm-menu">
						<div class="contenair-menu-el main-comm-menu">
							<a href="index.php?action=administration&want=seeComments" class="a-menu-bar comms-el">
								<i class="far fa-comment icon-menu-bar"></i>Commentaires
							</a>
						</div>

						<div id="contenair-menu-el" class="secondary-comm-menu" style="display : none;">
							<div class="contenair-menu-el">
								<a href="index.php?action=administration&want=seeComments" class="a-menu-bar secondary-comm-a">
									<i class="far fa-comment icon-menu-bar"></i>Tout les commentaires
								</a>
							</div>

							<div class="contenair-menu-el">
								<a href="index.php?action=administration&want=seeReportedComments" class="a-menu-bar secondary-comm-a">
									<i class="fas fa-flag icon-menu-bar"></i>Commentaires signalés
								</a>
							</div>
						</div>
					</div>
					<div class="contenair-menu-el headband">
						<p>Gestion de votre compte</p>
					</div>
					<div class="contenair-menu-el">
						<a href="index.php?action=administration&want=logout">
							<i class="fas fa-sign-out-alt icon-menu-bar"></i>Déconnexion
						</a>
					</div>
				</div>
			</div>

			<script type="text/javascript">
				var commMenu = document.querySelector("#contenair-comm-menu");
				var secondaryCommMenu = document.querySelector(".secondary-comm-menu");
				var secondaryCommA = document.querySelectorAll(".secondary-comm-a");
				commMenu.addEventListener("mouseover", function(){
					secondaryCommMenu.style.display = "block";
					for(var i=0; i < secondaryCommA.length; i++)
					{
						secondaryCommA[i].style.marginLeft = "50px";
					}
				})

				commMenu.addEventListener("mouseleave", function(){
					secondaryCommMenu.style.display = "none";
				})

			</script>
		</body>
	</html>