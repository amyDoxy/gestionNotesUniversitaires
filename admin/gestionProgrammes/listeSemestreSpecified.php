<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/functions.php";
	

	$progrSelected = $_GET['progrSelected'];
	if( isset($_GET['progrSelected']) ){
		header("Content-Type:text/xml");
		
		$tablename1 = "UDM_Semestre";
		$tablename2 = "UDM_programme";
		$rootXml = "semestre";

		$sql ="SELECT * FROM $tablename1  WHERE programme= '".$progrSelected."'";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
	}
	else{
		echo "Selectionner d'abord un département!";
	}
	


?>