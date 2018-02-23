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

	public static function logOut()
	{
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		session_destroy();
		header("Location: index.php?action=homepage&page=1");
	}
}