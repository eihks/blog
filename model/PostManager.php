<?php
require_once("model/Manager.php");
class PostManager extends Manager{

	public function getPostsForHomepage($start, $postPerPage)
	{
		$db = $this->db();
		$posts = $db->query("SELECT id, author, title, content, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM tickets ORDER BY id DESC LIMIT " .$start . ", " . $postPerPage);
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

	public function getTotalRow()
	{
		$db = $this->db();
		$totalRows = $db->query("SELECT id FROM tickets");
		$totalRows = $totalRows->rowCount();
		return $totalRows;
	}

	public function getPosts()
	{
		$db = $this->db();
		$posts = $db->query("SELECT id, author, title, content, DATE_FORMAT(creation_date, \" Le %d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr FROM tickets ORDER BY id");
		return $posts;
	}

	public function updatePost($title, $content, $id_post)
	{
		$db = $this->db();
		$post = $db->prepare("UPDATE tickets SET title = :title, content = :content WHERE id = :id");
		$post->execute(array(
			"title" => $title,
			"content" => $content,
			"id" => $id_post
		));
		return $post;
	}

	public function insertPost($title, $content)
	{
		$db = $this->db();
		$post = $db->prepare("INSERT INTO tickets(title, content, creation_date) VALUES(:title, :content, NOW())");
		$post->execute(array(
			"title" => $title,
			"content" => $content
		));
		return $post;
	}

	public function deletePost()
	{
		$db = $this->db();
		$post = $db->prepare("DELETE FROM tickets WHERE id = :id");
		$post->execute(array(
			"id" => $_GET["id_post"]
		));
	}
}