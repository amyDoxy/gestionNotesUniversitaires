<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_fac_suppr = $_GET['id_fac_suppr'];
	
	$table = "UDM_faculte";

	if( $id_fac_suppr)
	{
		
		try
		{
			
			$sqlDeleteProgramme ="";
			
			$sqlDelete = "DELETE FROM $table WHERE id_faculte = $id_fac_suppr";
			
			$resultDelete= $conn->prepare($sqlDelete);
			

			$resultDelete->execute();

				echo "Suppression de la base de donnée avec succes de la faculté. ";
			
		

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