<?php
require("controller/controller.php");
if(isset($_GET["action"]))
{
	if($_GET["action"] === "homepage")
	{
		Controller::homepage();
	}
}