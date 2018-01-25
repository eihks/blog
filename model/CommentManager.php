<?php
require_once("model/Manager.php");
class CommentManager extends Manager{
	public function getComms()
	{
		$db = $this->db();
		$comms = $db->prepare("SELECT *, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM comments WHERE id_post = :id_post ORDER BY id DESC");
		$comms->execute(array(
			"id_post" => $_GET["id_post"]
		));
		return $comms;
	}
	public function insertComment()
	{
		$db = $this->db();
		$post = $db->prepare("INSERT INTO comments(id_post, content, creation_date) VALUES(:id_post, :content, NOW())");
		$post->execute(array(
			"id_post" => $_GET["id_post"],
			"content" => $_POST["content"]
		));
		return $post;
	}
	public function reportComment()
	{
		$db = $this->db();
		$comment = $db->prepare("UPDATE comments SET report_level=report_level+1 WHERE id = :id");
		$comment->execute(array(
			"id" => $_GET["id"]
		));
		return $comment;
	}
}