<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/functions.php";
	

	$deptSelected = $_GET['deptSelected'];
	if( isset($_GET['deptSelected']) ){
		try {
			header("Content-Type:text/xml");

			$tablename1 = "UDM_infosUtilisateur";
			$tablename2 = "UDM_profileUtilisateur";
			$tablename3 = "UDM_universitaire";
			$tablename4 = "UDM_professeur";
			$tablename5 = "UDM_departement";
			

			
			$rootXml = "professeur";

			$sql ="SELECT IU.nom_utilisateur, IU.prenom_utilisateur, P.id_professeur FROM $tablename1 IU, $tablename2 PU, $tablename3 U,$tablename4 P WHERE IU.id_infosUtilisateur = PU.id_infosutilisateur AND PU.username = U.username AND U.id_universitaire = P.universitaire AND U.departement in (SELECT id_departement FROM $tablename5 WHERE nom_departement = '".$deptSelected."')" ;
	
			echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );

		} catch (PDOEXCEPTION $e) {
			echo "Erreur: ".$e->getMessage();
		}
		
	}
	else{
		echo "Selectionner d'abord un département!";
	}
	


?>