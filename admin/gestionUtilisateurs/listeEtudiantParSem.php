<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";
	

	$semestSelected = $_GET['semestSelected'];
	if( isset($_GET['semestSelected']) ){
		header("Content-Type:text/xml");
		
		$tablename1 = "UDM_etudiant";
		$tablename2 = "UDM_semestre";
		$tablename3 = "UDM_universitaire";
		
		$rootXml = "etudiant";

		$sql ="SELECT E.*, S.libelle_semestre, S.annee, U.username FROM $tablename1 E, $tablename2 S, $tablename3 U  where E.semestre = S.id_semestre AND E.universitaire = U.id_universitaire AND E.`semestre` = '".$semestSelected."'";
	
		echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
	}
	else{
		echo "Selectionner d'abord un semestre!";
	}
	


?>