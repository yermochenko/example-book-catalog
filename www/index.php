<?php
	require_once 'config.php';
	try {
		$pdo = new PDO(DataBase::DSN, DataBase::USER, DataBase::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$authors = $pdo->query('SELECT `id`, `name`, `surname` FROM `author`', PDO::FETCH_ASSOC);
		if(isset($_GET['id'])) {
			$books = $pdo->prepare('SELECT `id`, `title`, `pages` FROM `book` WHERE `author_id` = :id');
			$books->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
			$books->execute();
			$books = $books->fetchAll(PDO::FETCH_ASSOC);
			print_r($books);
		}
		$pdo = NULL;
		include 'view-index.php';
	} catch(PDOException $e) {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Database error'));
	}