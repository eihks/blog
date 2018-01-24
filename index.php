<?php
require("controller/controller.php");

try{
	if(isset($_GET["action"]))
	{
		if($_GET["action"] === "homepage")
		{
			Controller::homepage();
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
		else
		{
			header("Location: index.php?action=homepage");
		}
	}
}
catch(Exception $e)
{
	echo "Erreur : ". $e->getMessage();
}
