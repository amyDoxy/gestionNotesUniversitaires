<?php
	require_once "../connexionDB.php";
	require_once "../includes/functions.php";

	header("Content-Type:text/xml");
	$table1 = "UDM_etudiant";
	$table2 = "UDM_universitaire";
	$table3 = "UDM_departement";
	$rootXml = "etudiant";
	$sql = "SELECT E.id_etudiant, U.username, E.type,U.departement, D.nom_departement FROM $table1 E, $table2 U,$table3 D WHERE E.universitaire = U.id_universitaire AND U.departement = D.id_departement ";
	$resultat= "";
	$resultat = sqlSousXml(executeSql($conn, $sql), $rootXml);
	echo $resultat;

?>