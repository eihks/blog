<?php
require_once("model/Manager.php");
class PostManager extends Manager{

	public function getPosts()
	{
		$db = $this->db();
		$posts = $db->query("SELECT id, author, title, content, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM tickets ORDER BY id DESC");
		return $posts;
	}
	public function getPost()
	{
		$db = $this->db();
		$post = $db->prepare("SELECT id, author, title, content, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM tickets WHERE id = :id");
		$post->execute(array(
			"id" => $_GET["id_post"]
		));
		return $post;
	}
}