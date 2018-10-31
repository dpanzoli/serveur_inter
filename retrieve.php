<?php

	$databaseHost = 'localhost';
	$databasePort = '3306';
	$databaseName = 'dpanzoli';
	$login = 'dpanzoli';
	$password = 'rCkJbwHxjavCRHGE001N';
	
	if (!isset($_GET['user']) {
		die('Error for ???');
	}
	
	try {
		$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;            
		$pdo = new PDO('mysql:host=' . $databaseHost . ';port=' . $databasePort . ';dbname=' . $databaseName, $login, $password, $pdoOptions);
		$pdo->exec('SET NAMES UTF8');
		$query = "select * from Inter_scores limit 1";
		$result = $pdo->query($query);
		unset($pdo);
        if ($result) {
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                echo(json_encode($result[0]));
            } else {
				echo('La table est vide');
			}
        }
	} catch (Exception $e) {
		die('Error for PDO: ' . $e->getMessage());
	}

?>