<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";
	header("Content-Type:text/xml");

	$params = array("nom_de_faculte");
	$tablename = "UDM_Faculte";
	$rootXML = "faculte";
	
	echo(sqlSousXml(getColumns($conn, $params, $tablename),  $rootXML) );


?>