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
		if($totalPage == 0)
		{
			require("view/frontend/homepageView.php");
		}
		elseif($_GET["page"] > $totalPage)
		{
			header("Location: index.php?action=homepage&page=1");
		}
		else
		{
			require("view/frontend/homepageView.php");	
		}
	}
}