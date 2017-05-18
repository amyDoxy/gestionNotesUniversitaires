<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	
	$id_module_suppr = $_GET['id_module_suppr'];
	
	$table = "UDM_module";

	if( $id_module_suppr)
	{
		
		try
		{
			
			
			$sqlDelete = "DELETE FROM  $table  WHERE id_module = '".$id_module_suppr."'";
			
			
			
			$resultDel= $conn->prepare($sqlDelete);
			

			$resultDel->execute();

				echo "Suppression avec succes du module ";
			
		

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