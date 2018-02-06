<?php
session_start();
require_once("controller/frontend/controllerHomepage.php");
require_once("controller/frontend/controllerPosts.php");
require_once("controller/backend/controllerAdmin.php");

try{
	if(isset($_GET["action"]))
	{
		if($_GET["action"] === "homepage")
		{
			if(isset($_GET["page"]) AND $_GET["page"] > 0)
			{
				ControllerHomePage::homepage();
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
				ControllerPosts::postpage();
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
				ControllerPosts::newcomment();
			}
			else
			{
				throw new Exception("Aucun identifiant de billet envoyé");
			}
		}
		elseif($_GET["action"] === "reportcomment")
		{
			ControllerPosts::reportComment();
		}
		elseif($_GET["action"] === "administration")
		{
			if(isset($_GET["want"]))
			{
				if($_GET["want"] === "seePosts")
				{
					ControllerAdmin::seePosts();
				}
				elseif($_GET["want"] === "editPost" AND $_GET["id_post"] > 0)
				{
					if(isset($_POST["title"]) AND isset($_POST["content"]))
					{
						ControllerAdmin::updatePost();
					}
					else
					{
						ControllerAdmin::editPost();
					}
				}
				elseif($_GET["want"] === "newPost")
				{
					if(isset($_POST["title"]) AND isset($_POST["content"]))
					{
						ControllerAdmin::insertPost();
					}
					else
					{
						ControllerAdmin::newPost();
					}
				}
				elseif($_GET["want"] === "deletePost" AND $_GET["id_post"] > 0)
				{
					ControllerAdmin::deletePost();
				}
			}
			else
			{
				ControllerAdmin::login();
			}
		}
		elseif($_GET["action"] === "updatePost")
		{
			ControllerAdmin::updatePost();
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
