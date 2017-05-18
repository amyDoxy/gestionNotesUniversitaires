<?php
	require_once "requiredFiles.php";
	

	$semestSelected = $_GET['semestSelected'];
	if( isset($_GET['semestSelected']) ){
		try {
			header("Content-Type:text/xml");
		
			$tablename1 = "UDM_ue";
			
			$rootXml = "ue";

			$sql ="SELECT * FROM $tablename1  WHERE semestre= '".$semestSelected."'";
	
			echo (sqlSousXml(executeSql($conn, $sql),  $rootXml) );

		} catch (PDOException $e) {
			echo "Erreur: ". $e->getMessage();
		}
		
	}
	else{
		echo "Selectionner d'abord un semestre!";
	}
	


?>