<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";

	header("Content-Type:text/xml");
	$table = "UDM_departement";
	$rootXml = "departement";
	$resultat= "";
	$resultat = sqlSousXml(getAll($conn, $table), $rootXml);
	echo $resultat;

?> 