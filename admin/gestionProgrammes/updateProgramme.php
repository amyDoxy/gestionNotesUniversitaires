<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$id_unique_prog =$_GET['id_unique_prog']; 
	$intitule_programme = $_GET['intitule_programme'];
 	$cursus = $_GET['cursus'];
	$titre = $_GET['titre'];
	$table = "UDM_programme";

	if( $id_unique_prog && $intitule_programme && $cursus && $titre)
	{
		
		try
		{
			
			
			
			$sqlUpdate = "UPDATE $table 
					SET  intitule_programme = :intitule_programme, cursus = :cursus, titre = :titre
					WHERE id_programme = $id_unique_prog
					";
			
			$resultUpdate= $conn->prepare($sqlUpdate);
			
			$resultUpdate->bindParam(':intitule_programme', $intitule_programme);
			$resultUpdate->bindParam(':cursus', $cursus);
			$resultUpdate->bindParam(':titre', $titre);

			$resultUpdate->execute();

				echo "Mise à jour dans la base de donnée avec succes du programme \"".$titre." ".$intitule_programme."\"";
		} 
			
		
		catch(PDOException $e)
		{
			echo "Echec de mise à jour: ".$e->getMessage()."<br/>Réessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	