<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$identifiant_module = $_GET['identifiant_module'];
	$table = "UDM_module";

	if($identifiant_module){
		
		try{
			$sql = "SELECT *  FROM $table WHERE id_module = $identifiant_module LIMIT 1";

			$resultat = "<input type = 'hidden' id='id_module_suppr' value= '".$identifiant_module."'> ".sqlSousTable(executeSql($conn, $sql));
			
			echo $resultat;

		}
		catch(PDOException $e)
		{
			echo "Erreur: ".$e->getMessage();
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	