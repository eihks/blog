<?php
require_once("model/Manager.php");
class CommentManager extends Manager{
	public function getComms($id_post)
	{
		$db = $this->db();
		$comms = $db->prepare("SELECT *, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM comments WHERE id_post = :id_post ORDER BY id DESC");
		$comms->execute(array(
			"id_post" => $id_post
		));
		return $comms;
	}

	public function insertComment($id_post, $content, $post_name)
	{
		$db = $this->db();
		$post = $db->prepare("INSERT INTO comments(id_post, content, post_name ,creation_date) VALUES(:id_post, :content, :post_name, NOW())");
		$post->execute(array(
			"id_post" => $id_post,
			"content" => $content,
			"post_name" => $post_name
		));
		return $post;
	}

	public function reportComment($id)
	{
		$db = $this->db();
		$comment = $db->prepare("UPDATE comments SET report_level=report_level+1 WHERE id = :id");
		$comment->execute(array(
			"id" => $id
		));
		return $comment;
	}

	public function getReportedComments()
	{
		$db = $this->db();
		$comments = $db->query("SELECT *, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM comments WHERE report_level > 0 ORDER BY report_level DESC");
		return $comments;
	}

	public function getComment($id)
	{
		$db = $this->db();
		$comment = $db->prepare("SELECT *, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM comments WHERE id = :id");
		$comment->execute(array(
			"id" => $id
		));
		return $comment;
	}

	public function deleteComment($id)
	{
		$db = $this->db();
		$comment = $db->prepare("DELETE FROM comments WHERE id = :id");
		$comment->execute(array(
			"id" => $id
		));
		return $comment;
	}

	public function editComment($content, $id)
	{
		$db = $this->db();
		$comment = $db->prepare("UPDATE comments SET content = :content, report_level = 0 WHERE id = :id");
		$comment->execute(array(
			"content" => $content,
			"id" => $id
		));
		return $comment;
	}

	public function confirmComment($id)
	{
		$db = $this->db();
		$comment = $db->prepare("UPDATE comments SET report_level = 0 WHERE id = :id");
		$comment->execute(array(
			"id" => $id
		));
		return $comment;
	}

	public function get5LastsComment()
	{
		$db = $this->db();
		$comments = $db->query("SELECT *, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM comments ORDER BY id DESC LIMIT 5");
		return $comments;
	}

	public function getAllComments()
	{
		$db = $this->db();
		$comments = $db->query("SELECT *, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM comments ORDER BY id DESC");
		return $comments;
	}
}