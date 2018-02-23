<?php
require_once("model/PostManager.php");
require_once("model/CommentManager.php");
class ControllerHomePage{
	public static function homepage()
	{
		$postPerPage = 3;
		$postManager = new PostManager();
		$totalPost = $postManager->getTotalRow();
		$totalPage = ceil($totalPost/$postPerPage);
		$currentPage = $_GET["page"];
		$start = ($currentPage -1)*$postPerPage;
		$posts = $postManager->getPostsWithPagination($start, $postPerPage);
		require("view/frontend/homepageView.php");
	}
}