<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";
	

	$semestSelected = $_GET['semestSelected'];
	if( isset($_GET['semestSelected']) ){
		header("Content-Type:text/xml");
		
		$tablename1 = "UDM_ue";
		$tablename2 = "UDM_pole";
		$tablename3 = "UDM_module";
	
		
		$rootXml = "module";

		$sql ="SELECT UE.*, PO.description_pole, M.*
					FROM $tablename1 UE, $tablename2 PO, $tablename3 M
					where UE.id_ue = PO.unite_enseignement AND PO.id_pole = M.pole AND UE.semestre = '".$semestSelected."'";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
	}
	else{
		echo "Selectionner d'abord un semestre!";
	}
	


?>