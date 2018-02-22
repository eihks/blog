<?php
require_once("model/CommentManager.php");
require_once("model/PostManager.php");
class ControllerAdminComment{
	public static function seeAllComments()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$commentManager = new CommentManager();
			$comments = $commentManager->getAllComments();
			require("view/backend/seeCommentsView.php");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}	
	}

	public static function seeReportedComments()
	{
		$commentManager = new CommentManager();
		$comments = $commentManager->getReportedComments();
		require("view/backend/seeReportedCommentsView.php");
	}

	public static function controlComment()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$commentManager = new CommentManager();
			$comment = $commentManager->getComment();
			require("view/backend/seeCommentView.php");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}	
	}

	public static function deleteComment()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$commentManager = new CommentManager();
			$comment = $commentManager->deleteComment();
			header("Location: index.php?action=administration&want=seeComments");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}		
	}

	public static function editComment()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			if(isset($_POST["content"]))
			{
				$commentManager = new CommentManager();
				$comment = $commentManager->editComment();
				header("Location: index.php?action=administration&want=seeComments");
			}
			else
			{
				$commentManager = new CommentManager();
				$comment = $commentManager->getComment();
				require("view/backend/editCommentView.php");
			}
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}	
	}

	public static function confirmComment()
	{
		if(isset($_SESSION["isLog"]) AND $_SESSION["isLog"] == true)
		{
			$commentManager = new CommentManager();
			$comment = $commentManager->confirmComment();
			header("Location: index.php?action=administration&want=seeComments");
		}
		else
		{
			throw new Exception("Vous n'étes pas connecter ! ");
		}
	}
}