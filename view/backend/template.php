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
			    width : "100%",
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
					<ul>
						<a href="index.php"><li>Retourner sur la page d'accueil du blog</li></a>
						<a href="index.php?action=administration&want=seePosts"><li id="tickets-button">Mes tickets</li></a>
						<a href="index.php?action=administration&want=seeComments"><li id="comments-button">Gérer les commentaires</li></a>
					</ul>
				</div>
			</div>
		</body>
	</html>