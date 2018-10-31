<?php

	require_once 'config.php';
	
	try {
		$pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;            
		$pdo = new PDO('mysql:host=' . $databaseHost . ';port=' . $databasePort . ';dbname=' . $databaseName, $login, $password, $pdoOptions);
		$pdo->exec('SET NAMES UTF8');
		$query = "select * from Variables where id_user='".$_GET['id_user']."' and variable='".$_GET['var']."'  limit 1";
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
					'data'=>'Il n\'existe pas dans de variable '.$_GET['var'].' pour '.$_GET['id_user'].' dans la base.'
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