<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_prog_suppr = $_GET['id_prog_suppr'];
	
	$table = "UDM_programme";

	if( $id_prog_suppr)
	{
		
		try
		{
			
			
			
			$sqlDelete = "DELETE FROM $table WHERE id_programme = $id_prog_suppr";
			
			$resultDelete= $conn->prepare($sqlDelete);
			

			$resultDelete->execute();

				echo "Suppression de la base de donnée avec succes du programme ";
			
		

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