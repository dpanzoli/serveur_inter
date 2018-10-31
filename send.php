<?php

	$databaseHost = 'localhost';
	$databasePort = '3306';
	$databaseName = 'dpanzoli';
	$login = 'dpanzoli';
	$password = 'rCkJbwHxjavCRHGE001N';
	
	try {
		$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;            
		$pdo = new PDO('mysql:host=' . $databaseHost . ';port=' . $databasePort . ';dbname=' . $databaseName, $login, $password, $pdoOptions);
		$pdo->exec('SET NAMES UTF8');
		$query = "insert into Inter_scores values (".$_GET['user'];.",".$_GET['score'];.")";
		$result = $pdo->exec($query);
		unset($pdo);
	} catch (Exception $e) {
		die('Error for PDO: ' . $e->getMessage());
	}

?>