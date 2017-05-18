<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_dept_suppr = $_GET['id_dept_suppr'];
	
	$table = "UDM_departement";

	if( $id_dept_suppr)
	{
		
		try
		{
			
			
			
			$sqlDelete = "DELETE FROM $table WHERE id_departement = $id_dept_suppr";
			
			$resultDelete= $conn->prepare($sqlDelete);
			

			$resultDelete->execute();

				echo "Suppression de la base de donnée avec succes du département ";
			
		

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