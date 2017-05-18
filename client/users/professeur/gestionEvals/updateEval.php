<?php
	require_once "../../../connexionDB.php";
	require_once "../../../includes/verificationSession.php";
	require_once "../../../includes/functions.php";

	
     
	
	$id_unique_eval =$_GET['id_unique_eval']; 
	$libelle_evaluation = $_GET['libelle_evaluation'];
    $coeff_evaluation = isset ($_GET['coeff_evaluation'] )? $_GET['coeff_evaluation']: 0;
    $cotation_evaluation = $_GET['cotation_evaluation'];
    $date_evaluation = $_GET['date_evaluation'];
	$table = "UDM_evaluation";

	if( $id_unique_eval && $libelle_evaluation && $cotation_evaluation && $date_evaluation)
	{
		
		try
		{

				$sqlUpdateEval = "UPDATE $table SET  `libelle_evaluation`= :libelle_evaluation,  `coeff_evaluation` = :coeff_evaluation , `cotation_evaluation` = :cotation_evaluation, `date_evaluation` = :date_evaluation WHERE `id_evaluation` = ".$id_unique_eval	;
				


				//Mise à jour de la table UDM_module
				$resultUpdateEval= $conn->prepare($sqlUpdateEval);
				$resultUpdateEval->bindParam(':libelle_evaluation', $libelle_evaluation);
				$resultUpdateEval->bindParam(':coeff_evaluation', $coeff_evaluation);
				$resultUpdateEval->bindParam(':cotation_evaluation', $cotation_evaluation);
				$resultUpdateEval->bindParam(':date_evaluation', $date_evaluation);
				$resultUpdateEval->execute();


				echo "Mise à jour dans la base de donnée avec succès de l'évaluation \"".$libelle_evaluation."\"";
			
		} 
			
		
		catch(PDOException $e)
		{
			echo "\nEchec de mise à jour: ".$e->getMessage()."\nRéessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	