<?php
session_start();
require("controller/controller.php");

try{
	if(isset($_GET["action"]))
	{
		if($_GET["action"] === "homepage")
		{
			if(isset($_GET["page"]) AND $_GET["page"] > 0)
			{
				Controller::homepage();
			}
			else
			{
				header("Location: index.php?action=homepage&page=1");
			}
		}
		elseif($_GET["action"] === "postpage")
		{
			if(isset($_GET["id_post"]) AND $_GET["id_post"] > 0)
			{
				Controller::postpage();
			}
			else
			{
				throw new Exception("Aucun identifiant de billet envoyé");
			}
		}
		elseif($_GET["action"] === "newcomment")
		{
			if(isset($_GET["id_post"]) AND $_GET["id_post"] > 0)
			{
				Controller::newcomment();
			}
			else
			{
				throw new Exception("Aucun identifiant de billet envoyé");
			}
		}
		elseif($_GET["action"] === "reportcomment")
		{
			Controller::reportComment();
		}
	}
	else
	{
		header("Location: index.php?action=homepage&page=1");
	}
}
catch(Exception $e)
{
	echo "Erreur : ". $e->getMessage();
	echo "<br><a href='index.php?action=homepage&id_page=1'>Retourner sur la page d'accueil du blog</a>";
}
