<?php
require_once("model/PostManager.php");
require_once("model/commentManager.php");
class ControllerPosts{
	public static function postpage()
	{
		$postManager = new PostManager();
		$post = $postManager->getPost();
		$commentManager = new CommentManager();
		$comms = $commentManager->getComms();
		require("view/frontend/postView.php");
	}
	public static function newComment()
	{
		$CommentManager = new CommentManager();
		$post = $CommentManager->insertComment();
		header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]);
	}
	public static function reportComment()
	{
		if(isset($_COOKIE["reportedCommentList"]))
		{
			$cookieUnserialize = unserialize($_COOKIE["reportedCommentList"]);
			foreach($cookieUnserialize as $reportid)
			{
				if($reportid === $_GET["id"])
				{
					$_SESSION["alreadyReported"] = true;
					header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]);
					throw new Exception("Commentaire déjà signalé");
				}
			}
			array_push($cookieUnserialize, $_GET["id"]);
			$cookieSerialize = serialize($cookieUnserialize);
			setcookie("reportedCommentList", $cookieSerialize, time() + (31556926)); //31556926 = total seconds in one year
			$commentManager = new CommentManager();
			$reportedComment = $commentManager->reportComment();
			header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]);					
		}
		else
		{
			$tableReportComment = array($_GET["id"]);
			$tableReportCommentSerialize = serialize($tableReportComment);
			setcookie("reportedCommentList", $tableReportCommentSerialize, time() + (31556926));
			$commentManager = new CommentManager();
			$reportedComment = $commentManager->reportComment();
			header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]);
		}
	}
}