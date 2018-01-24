<?php
class Manager{
	protected function db()
	{
		$db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
		return $db;
	}
}