<?php
require_once("model/PostManager.php");
require_once("model/commentManager.php");
class Controller{
	public static function homepage()
	{
		$postManager = new PostManager();
		$posts = $postManager->getPosts();
		require("view/frontend/homepageView.php");
	}
	public static function postpage()
	{
		$postManager = new PostManager();
		$post = $postManager->getPost();
		$commentManager = new CommentManager();
		$comms = $commentManager->getComms();
		require("view/frontend/postView.php");
	}
}