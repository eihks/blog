<?php
require_once("model/PostManager.php");
class Controller{
	public static function homepage()
	{
		$postManager = new PostManager();
		$posts = $postManager->getPosts();
		require("view/frontend/homepageView.php");
	}
}