<?php
	require_once "requiredFiles.php";
	

	$facSelected = $_GET['facSelected'];
	if( isset($_GET['facSelected']) ){
		header("Content-Type:text/xml");
		
		$tablename1 = "UDM_Departement";
		$tablename2 = "UDM_Faculte";
		$rootXML = "departement";

		$sql ="SELECT nom_departement FROM $tablename1 D, $tablename2 F WHERE D.faculte_du_dept = F.id_faculte AND F.nom_de_faculte = '".$facSelected."'";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXML) );
	}
	else{
		echo "Selectionner d'abord une faculté!";
	}
	


?>