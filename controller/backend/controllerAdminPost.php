<?php
require_once("model/CommentManager.php");
require_once("model/PostManager.php");
class ControllerAdminPost{
	public static function login()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$post = $postManager->getLastPost();
			$commentManager = new CommentManager();
			$comments = $commentManager->get5LastsComment();
			require("view/backend/administrationHomepage.php");
		}
		else
		{
			$_SESSION["isLog"] = false;
			$passwordHash = password_hash("test", PASSWORD_DEFAULT);
			if(isset($_POST["password"]) AND password_verify($_POST["password"], $passwordHash))
			{
				$_SESSION["isLog"] = true;
				$postManager = new PostManager();
				$post = $postManager->getLastPost();
				$commentManager = new CommentManager();
				$comments = $commentManager->get5LastsComment();
				require("view/backend/administrationHomepage.php");
			}
			else
			{
				require("view/backend/loginView.php");
			}
		}
	}

	public static function seePosts()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$posts = $postManager->getPosts();
			require("view/backend/seePostsView.php");
		}
		else
		{
			require("view/backend/loginView.php");
		}
	}

	public static function editPost()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$post = $postManager->getPost();
			require("view/backend/editPostView.php");
		}
		else
		{
			require("view/backend/loginView.php");
		}
	}

	public static function updatePost()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$post = $postManager->updatePost($_POST["title"], $_POST["content"], $_GET["id_post"]);
			header("Location: index.php?action=administration");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}
	}

	public static function newPost()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			require("view/backend/editPostView.php");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}
	}

	public static function insertPost()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$post = $postManager->insertPost($_POST["title"], $_POST["content"]);
			header("Location: index.php?action=administration");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}	
	}

	public static function deletePost()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$post = $postManager->deletePost();
			header("Location: index.php?action=administration");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}	
	}
}
