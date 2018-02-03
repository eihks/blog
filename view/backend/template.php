<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="public/styleAdministration.css" />
			<title><?= $title; ?></title>
		</head>

		<body>
			<div id="page">
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