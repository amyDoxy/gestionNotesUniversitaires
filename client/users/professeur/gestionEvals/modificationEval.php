<?php
	require_once "../../../connexionDB.php";
	require_once "../../../includes/verificationSession.php";
	require_once "../../../includes/functions.php";
	
	
	
	$identifiant_eval = $_GET['identifiant_eval'];
	
	
	$table = "UDM_evaluation";

	

	if($identifiant_eval){
		
		try{
			$sql = "SELECT  libelle_evaluation, coeff_evaluation, cotation_evaluation, date_evaluation FROM $table WHERE id_evaluation = $identifiant_eval";

			$resultat = "<input type = 'hidden' id='id_unique_eval' value= '".$identifiant_eval."'> ".sqlSousInput(executeSql($conn, $sql));
			
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