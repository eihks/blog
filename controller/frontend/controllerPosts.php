<?php
require_once("model/PostManager.php");
require_once("model/commentManager.php");
class ControllerPosts{
	public static function postpage() //display the post page
	{
		$postManager = new PostManager();
		$post = $postManager->getPost();
		$commentManager = new CommentManager();
		$comms = $commentManager->getComms($_GET["id_post"]);
		$visit = $postManager->addOneVisit($_GET["id_post"]);
		require("view/frontend/postView.php");
	}

	public static function newComment() //create a new comment
	{
		$CommentManager = new CommentManager();
		$post = $CommentManager->insertComment($_GET["id_post"], $_POST["content"], $_GET["post_name"]);
		header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]. "&title=".$_GET["title"]);
	}

	public static function reportComment() //report a comment
	{
		if(isset($_COOKIE["reportedCommentList"])) //check if user have a cookie where is listed all comments he reported
		{
			$cookieUnserialize = unserialize($_COOKIE["reportedCommentList"]);
			foreach($cookieUnserialize as $reportid)
			{
				if($reportid === $_GET["id"]) //check all comment id user have reported in the past,and check with the comment id he want report
				{
					$_SESSION["alreadyReported"] = true; //usefull for display a JS alert in the view
					header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]. "&title=" .$_GET["title"]);				
				}
			}
			array_push($cookieUnserialize, $_GET["id"]); //add the reported comment id in the cookie
			$cookieSerialize = serialize($cookieUnserialize);
			setcookie("reportedCommentList", $cookieSerialize, time() + (31556926)); //31556926 = total seconds in one year
			$commentManager = new CommentManager();
			$reportedComment = $commentManager->reportComment($_GET["id"]);
			header("Location: index.php?action=postpage&id_post=" .$_GET["id_post"]. "&title=" .$_GET["title"]);				
		}
		else
		{
			$tableReportComment = array($_GET["id"]);
			$tableReportCommentSerialize = serialize($tableReportComment);
			setcookie("reportedCommentList", $tableReportCommentSerialize, time() + (31556926)); //31556926 = total seconds in one year
			$commentManager = new CommentManager();
			$reportedComment = $commentManager->reportComment($_GET["id"]);
			header("Location: index.php?action=postpage&id_post=" . $_GET['id_post'] . "&title=" . $_GET['title']);
		}
	}
}