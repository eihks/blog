<?php
class controllerAdminLogin{
	public static function login()
	{
		$passwordHash = password_hash("test", PASSWORD_DEFAULT);
		if(isset($_POST["password"]) AND password_verify($_POST["password"], $passwordHash))
		{
			echo "ok";
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