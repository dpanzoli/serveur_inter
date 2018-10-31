<?php

	require_once 'config.php';
	
	try {
		$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;            
		$pdo = new PDO('mysql:host=' . $databaseHost . ';port=' . $databasePort . ';dbname=' . $databaseName, $login, $password, $pdoOptions);
		$pdo->exec('SET NAMES UTF8');
		$query = "select * from Inter_scores where id_user='".$_GET['id_user']."' limit 1";
		$result = $pdo->query($query);
		unset($pdo);
        if ($result) {
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                echo json_encode( array(
					'code'=>0,
					'data'=>$result[0]
				));
            } else {
				echo json_encode( array(
					'code'=>-1,
					'data'=>$_GET['id_user'].' n\'existe pas dans la base.'
				));
			}
        }
	} catch (Exception $e) {
		echo json_encode( array(
			'code'=>-1,
			'data'=>$e->getMessage()
		));
	}

?>