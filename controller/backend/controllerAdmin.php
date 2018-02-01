<?php
require_once("model/PostManager.php");
class controllerAdmin{
	public static function login()
	{
		$postManager = new PostManager();
		$posts = $postManager->getPosts();
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == false)
		{
			require("view/backend/administrationView.php");
		}
		else
		{
			$_SESSION["isLog"] = false;
			$postManager = new PostManager();
			$posts = $postManager->getPosts();
			$passwordHash = password_hash("test", PASSWORD_DEFAULT);
			if(isset($_POST["password"]) AND password_verify($_POST["password"], $passwordHash))
			{
				$_SESSION["isLog"] = true;
				require("view/backend/administrationView.php");
			}
			else
			{
				echo "pas ok";
				echo $passwordHash;
				require("view/backend/loginView.php");
			}
		}
	}

	public static function editPost()
	{
		$postManager = new PostManager();
		$post = $postManager->getPost();
		$postManager = new PostManager();
		$posts = $postManager->getPosts();
		require("view/backend/administrationView.php");
	}
}