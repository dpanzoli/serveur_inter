<?php
	header("Access-Control-Allow-Origin: *");
	require_once 'config.php';

	try {
		$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;            
		$pdo = new PDO('mysql:host=' . $databaseHost . ';port=' . $databasePort . ';dbname=' . $databaseName, $login, $password, $pdoOptions);
		$pdo->exec('SET NAMES UTF8');
		$query = "insert into Variables (id_user, variable, valeur) values ('".$_GET['id_user']."','".$_GET['variable']."',".$_GET['valeur'].")";
		$result = $pdo->exec($query);
		unset($pdo);
		echo json_encode( array(
			'code'=>0,
			'data'=>'Valeur enregistrée dans la base'
		));
	} catch (Exception $e) {
		//clé existante, on tente un update
		try {
			$query = "update Variables set valeur=".$_GET['valeur']." where id_user='".$_GET['id_user']."' and variable='".$_GET['variable']."';";
			$result = $pdo->exec($query);
			echo json_encode( array(
				'code'=>0,
				'data'=>'Valeur modifiée dans la base'
			));
		} catch (Exception $e) {
			echo json_encode( array(
				'code'=>-1,
				'data'=>$e->getMessage()
			));
		}
	}

?>