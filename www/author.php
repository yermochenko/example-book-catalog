<?php
	$search = urldecode($_SERVER['QUERY_STRING']);
	if(strlen($search) != 0) {
		require_once 'config.php';
		try {
			$pdo = new PDO(DataBase::DSN, DataBase::USER, DataBase::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$authors = $pdo->prepare('SELECT `id`, `name`, `surname` FROM `author` WHERE `name` LIKE :search_name OR `surname` LIKE :search_surname');
			$search = '%'.urldecode($_SERVER['QUERY_STRING']).'%';
			$authors->bindValue(':search_name', $search, PDO::PARAM_STR);
			$authors->bindValue(':search_surname', $search, PDO::PARAM_STR);
			$authors->execute();
			$authors = $authors->fetchAll(PDO::FETCH_ASSOC);
			$pdo = NULL;
			echo json_encode($authors);
		} catch(PDOException $e) {
			header('HTTP/1.0 500 Internal Server Error');
		}
	}