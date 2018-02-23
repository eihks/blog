<?php
require_once("model/CommentManager.php");
require_once("model/PostManager.php");
class ControllerAdminPost{
	public static function seePosts()
	{
		$postPerPage = 30;
		$postManager = new PostManager();
		$totalPost = $postManager->getTotalRow();
		$totalPage = ceil($totalPost/$postPerPage);
		$currentPage = $_GET["page"];
		$start = ($currentPage -1)*$postPerPage;
		$posts = $postManager->getPostsWithPagination($start, $postPerPage);
		require("view/backend/seePostsView.php");
	}

	public static function editPost()
	{
		$postManager = new PostManager();
		$post = $postManager->getPost($_GET["id_post"]);
		require("view/backend/editPostView.php");
	}

	public static function updatePost()
	{
		$postManager = new PostManager();
		$post = $postManager->updatePost($_POST["title"], $_POST["content"], $_GET["id_post"]);
		header("Location: index.php?action=administration");
	}

	public static function newPost()
	{
		require("view/backend/editPostView.php");
	}

	public static function insertPost()
	{
		$postManager = new PostManager();
		$post = $postManager->insertPost($_POST["title"], $_POST["content"]);
		header("Location: index.php?action=administration");	
	}

	public static function deletePost()
	{
		$postManager = new PostManager();
		$post = $postManager->deletePost($_GET["id_post"]);
		header("Location: index.php?action=administration");
	}
}