<?php
require("controller/controller.php");
if(isset($_GET["action"]))
{
	if($_GET["action"] === "homepage")
	{
		Controller::homepage();
	}
}
else
{
	header("Location: index.php?action=homepage");
}