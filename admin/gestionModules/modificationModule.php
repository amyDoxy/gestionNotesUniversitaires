<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	
	$identifiant_module = $_GET['identifiant_module'];
	
	
	$table = "UDM_module";

	

	if($identifiant_module){
		
		try{
			$sql = "SELECT  libelle_module, notation_cours, notation_tp, notation_td, notation_ds, credit_module, nb_heure  FROM $table WHERE id_module = $identifiant_module";

			$resultat = "<input type = 'hidden' id='id_unique_module' value= '".$identifiant_module."'> ".sqlSousInput(executeSql($conn, $sql));
			
			echo $resultat;

		}
		catch(PDOException $e)
		{
			echo "Erreur: ".$e->getMessage();
		}
		
		
		
	}
	else{
		echo "Nom invalide";
	}
		
	

?>	