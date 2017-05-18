<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	
	$id_semestre_suppr = $_GET['id_semestre_suppr'];
	
	$table = "UDM_semestre";

	if( $id_semestre_suppr)
	{
		
		try
		{
			
			
			
			$sqlDelete = "DELETE FROM $table WHERE id_semestre = $id_semestre_suppr";
			
			$resultDelete= $conn->prepare($sqlDelete);
			

			$resultDelete->execute();

				echo "Suppression de la base de donnée avec succes du semestre ";
			
		

		}
		catch(PDOException $e)
		{
			echo "Echec de suppression: ".$e->getMessage()."<br/>Réessayer";
		}
		
		
		
	}
	else{
		echo "Entrée invalide";
	}
		
	

?>	