<?php

	require_once 'config.php';

	try {
		$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;            
		$pdo = new PDO('mysql:host=' . $databaseHost . ';port=' . $databasePort . ';dbname=' . $databaseName, $login, $password, $pdoOptions);
		$pdo->exec('SET NAMES UTF8');
		$query = "insert into Inter_scores (id_user, score) values ('".$_GET['id_user']."',".$_GET['score'].")";
		$result = $pdo->exec($query);
		unset($pdo);
		echo json_encode( array(
			'code'=>0,
			'data'=>'Score enregistré dans la base'
		));
	} catch (Exception $e) {
		echo json_encode( array(
			'code'=>-1,
			'data'=>$e->getMessage()
		));
	}

?>