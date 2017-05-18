<?php
	//Recuperation des types d'evaluation dans la base de donnees
	require_once "requiredFiles.php";
	header("Content-Type:text/xml");
	$moduleSelected = $_GET['moduleSelected'];
	$table1 = "UDM_evaluation";
	$rootXml =  "type_evaluation";
	$sql = "SELECT DISTINCT type_eval FROM $table1 WHERE module = ".$moduleSelected;
	echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );

?>	