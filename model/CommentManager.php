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
}