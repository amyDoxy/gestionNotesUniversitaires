<?php
	require_once "../../../connexionDB.php";
	require_once "../../../includes/functions.php";
	
	
	
	$semestSelected = $_GET['semestSelected'];
	if( isset($_GET['semestSelected']) ){
		header("Content-Type:text/xml");
		
		$tablename1 = "UDM_ue";
		$tablename2 = "UDM_pole";
		
	
	
		
		$rootXml = "pole";

		$sql ="SELECT  PO.id_pole, PO.description_pole
					FROM $tablename1 UE, $tablename2 PO
					where UE.id_ue = PO.unite_enseignement AND  UE.semestre = '".$semestSelected."' ";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
	}
	else{
		echo "Selectionner d'abord un semestre!";
	}
	


?>
