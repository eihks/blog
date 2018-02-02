<?php
require_once("model/PostManager.php");
class controllerAdmin{
	public static function login()
	{
		$_SESSION["isLog"] = false;
		$passwordHash = password_hash("test", PASSWORD_DEFAULT);
		if(isset($_POST["password"]) AND password_verify($_POST["password"], $passwordHash))
		{
			$_SESSION["isLog"] = true;
			$postManager = new PostManager();
			$posts = $postManager->getPosts();
			require("view/backend/administrationView.php");
		}
		else
		{
			echo "pas ok";
			echo $passwordHash;
			require("view/backend/loginView.php");
		}
	}

	public static function editPost()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$postManager = new PostManager();
			$post = $postManager->getPost();
			$postManager = new PostManager();
			$posts = $postManager->getPosts();
			require("view/backend/administrationView.php");
		}
		else
		{
			require("view/backend/loginView.php");
		}
	}
}