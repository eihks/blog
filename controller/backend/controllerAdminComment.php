<?php
require_once("model/CommentManager.php");
require_once("model/PostManager.php");
class ControllerAdminComment{
	public static function seeAllComments()
	{
		$commentManager = new CommentManager();
		$commentsPerPage = 30;
		$totalComments = $commentManager->getTotalRows();
		$totalPage = ceil($totalComments/$commentsPerPage);
		$currentPage = $_GET["page"];
		$start = ($currentPage -1)*$commentsPerPage;
		if($totalPage == 0)
		{	
			$comments = $commentManager->getAllComments();
			require("view/backend/seeCommentsView.php");
		}
		elseif($_GET["page"] > $totalPage)
		{
			header("Location: index.php?action=administration&want=seeComments&page=1");
		}
		else
		{
			$comments = $commentManager->getCommsWithPagination($start, $commentsPerPage);
			require("view/backend/seeCommentsView.php");
		}
	}

	public static function seeReportedComments()
	{
		$commentManager = new CommentManager();
		$commentsPerPage = 30;
		$totalComments = $commentManager->getReportedTotalRows();
		$totalPage = ceil($totalComments/$commentsPerPage);
		$currentPage = $_GET["page"];
		$start = ($currentPage -1)*$commentsPerPage;
		if($totalPage == 0)
		{
			$comments = $commentManager->getReportedComments();
			require("view/backend/seeReportedCommentsView.php");
		}
		elseif($_GET["page"] > $totalPage)
		{
			header("Location: index.php?action=administration&want=seeReportedComments&page=1");
		}
		else
		{
			$comments = $commentManager->getReportedCommsWithPagination($start, $commentsPerPage);
			require("view/backend/seeReportedCommentsView.php");
		}
	}

	public static function deleteComment()
	{
		$commentManager = new CommentManager();
		$comment = $commentManager->deleteComment($_GET["comment_id"]);
		header("Location: index.php?action=administration&want=seeComments");		
	}

	public static function editComment()
	{
		if(isset($_POST["content"]))
		{
			$commentManager = new CommentManager();
			$comment = $commentManager->editComment($_POST["content"],$_GET["comment_id"] );
			header("Location: index.php?action=administration&want=seeComments");
		}
		else
		{
			$commentManager = new CommentManager();
			$comment = $commentManager->getComment($_GET["comment_id"]);
			require("view/backend/editCommentView.php");
		}
	}

	public static function confirmComment()
	{
		$commentManager = new CommentManager();
		$comment = $commentManager->confirmComment($_GET["comment_id"]);
		header("Location: index.php?action=administration&want=seeComments");
	}
}
