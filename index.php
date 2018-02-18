<?php
session_start();
require_once("controller/frontend/controllerHomepage.php");
require_once("controller/frontend/controllerPosts.php");
require_once("controller/backend/controllerAdmin.php");
try{
	if(isset($_GET["action"]))
	{
		if($_GET["action"] === "homepage") /* call homepage */ 
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
		elseif($_GET["action"] === "postpage") /* page where we can see the entire post and comments */
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
		elseif($_GET["action"] === "newcomment") /* add a new comment */
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
		elseif($_GET["action"] === "reportcomment") /* report a comment */
		{
			ControllerPosts::reportComment();
		}

		/* ============================== ADMINISTRATION ROOT =============================== */

		elseif($_GET["action"] === "administration") /* access the administration */
		{
			if(isset($_GET["want"]))
			{
				if($_GET["want"] === "seePosts") /* call page where we can see all posts */
				{
					ControllerAdmin::seePosts();
				}
				elseif($_GET["want"] === "editPost" AND $_GET["id_post"] > 0) /* edit post */
				{
					if(isset($_POST["title"]) AND isset($_POST["content"])) /* check if we got $_POST variable for update the post */
					{
						ControllerAdmin::updatePost();
					}
					else
					{
						ControllerAdmin::editPost();
					}
				}
				elseif($_GET["want"] === "newPost") /* create a new post */
				{
					if(isset($_POST["title"]) AND isset($_POST["content"])) /* check if we got $_POST variable for insert the post in db */
					{
						ControllerAdmin::insertPost();
					}
					else
					{
						ControllerAdmin::newPost();
					}
				}
				elseif($_GET["want"] === "deletePost" AND $_GET["id_post"] > 0) /* call for delete post */
				{
					ControllerAdmin::deletePost();
				}
				elseif($_GET["want"] === "seeComments") /* call page for see all reported comments */
				{
					ControllerAdmin::seeComments();
				}
				elseif($_GET["want"] === "deleteComment" AND $_GET["comment_id"] > 0) /* call for delete comment */
				{
					ControllerAdmin::deleteComment();
				}
				elseif($_GET["want"] === "editComment" AND $_GET["comment_id"] > 0) /* call for edit comment */
				{
					ControllerAdmin::editComment();
				}
				elseif($_GET["want"] === "confirmComment" AND $_GET["comment_id"] > 0) /* call for confirm comment (set the report_level to 0)*/
				{
					ControllerAdmin::confirmComment();
				}
			}
			else
			{
				ControllerAdmin::login();
			}
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