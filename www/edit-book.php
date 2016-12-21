<?php
	require_once 'config.php';
	try {
		$pdo = new PDO(DataBase::DSN, DataBase::USER, DataBase::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$authors = $pdo->query('SELECT `id`, `name`, `surname` FROM `author`', PDO::FETCH_ASSOC);
		$book = $pdo->prepare('SELECT `id`, `title`, `author_id`, `pages` FROM `book` WHERE `id` = :id');
		$book->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
		$book->execute();
		$book = $book->fetch(PDO::FETCH_ASSOC);
		$author = $pdo->prepare('SELECT `id`, `name`, `surname` FROM `author` WHERE `id` = :id');
		$author->bindValue(':id', $book['author_id'], PDO::PARAM_INT);
		$author->execute();
		$author = $author->fetch(PDO::FETCH_ASSOC);
		$pdo = NULL;
		print_r($authors);
		print_r($book);
		print_r($author);
	} catch(PDOException $e) {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Database error'));
	}
?>