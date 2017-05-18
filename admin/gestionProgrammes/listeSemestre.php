<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";

	header("Content-Type:text/xml");
	$table = "UDM_semestre";
	$rootXml = "semestre";
	$resultat= "";
	$resultat = sqlSousXml(getAll($conn, $table), $rootXml);
	echo $resultat;

?>