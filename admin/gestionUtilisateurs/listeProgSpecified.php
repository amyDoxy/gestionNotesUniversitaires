<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";
	

	$deptSelected = $_GET['deptSelected'];
	if( isset($_GET['deptSelected']) ){
		header("Content-Type:text/xml");
		
		$tablename2 = "UDM_Departement";
		$tablename1 = "UDM_programme";
		$rootXml = "programme";

		$sql ="SELECT id_programme,intitule_programme FROM $tablename1 P, $tablename2 D WHERE P.dept = D.id_departement AND D.id_departement= '".$deptSelected."'";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
	}
	else{
		echo "Selectionner d'abord un département!";
	}
	


?>