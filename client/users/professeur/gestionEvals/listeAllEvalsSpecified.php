<?php
	require_once "requiredFiles.php";
	

	$moduleSelected = $_GET['moduleSelected'];
	$typeSelected = $_GET['typeSelected'];

	if ($moduleSelected && $typeSelected) {
		
		try {


			header("Content-Type:text/xml");

			$sql = "SELECT DISTINCT id_evaluation, libelle_evaluation
			FROM  UDM_evaluation 
			WHERE module = ".$moduleSelected."
			AND  type_eval = '".$typeSelected."' ";
			$rootXml = "evaluation";

			echo(sqlSousXml(executeSql($conn, $sql),  $rootXml) );
			
		} catch (PDOException $e) {
			echo "Erreur : ".$e->getMessage();
		}
	}
	else{
		echo "Entrée invalide";
	}

	 


?>	