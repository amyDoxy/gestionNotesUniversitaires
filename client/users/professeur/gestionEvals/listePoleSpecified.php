<?php
	require_once "requiredFiles.php";
	

	$ueSelected = $_GET['ueSelected'];
	if( isset($_GET['ueSelected']) ){
		try {
			header("Content-Type:text/xml");
		
			$tablename1 = "UDM_Pole";
			
			$rootXml = "pole";

			$sql ="SELECT * FROM $tablename1  WHERE unite_enseignement= '".$ueSelected."'";
	
			echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );

		} catch (PDOEXCEPTION $e) {
			echo "Erreur: ".$e->getMessage();
		}
		
	}
	else{
		echo "Selectionner d'abord un semestre!";
	}
	


?>