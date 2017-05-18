<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/functions.php";
	

	
	if( isset($_GET['facSelected']) ){
		header("Content-Type:text/xml");
		$facSelected = $_GET['facSelected'];
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