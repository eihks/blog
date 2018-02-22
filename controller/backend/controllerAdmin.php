<?php
require_once("model/CommentManager.php");
require_once("model/PostManager.php");
class ControllerAdmin{
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
}