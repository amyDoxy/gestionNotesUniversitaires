<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";

	header("Content-Type:text/xml");
	$table = "UDM_faculte";
	$rootXml = "faculte";
	$resultat= "";
	$resultat = sqlSousXml(getAll($conn, $table), $rootXml);
	echo $resultat;

?> 