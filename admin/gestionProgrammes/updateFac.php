<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$id_unique_fac =$_GET['id_unique_fac']; 
	$nom_de_faculte = $_GET['nom_de_faculte'];
	
	$table = "UDM_faculte";

	if( $id_unique_fac && $nom_de_faculte)
	{
		
		try
		{
			
			
			
			$sqlUpdate = "UPDATE $table 
					SET  nom_de_faculte = :nom_de_faculte
					WHERE id_faculte = $id_unique_fac";
			
			$resultUpdate= $conn->prepare($sqlUpdate);
			
			$resultUpdate->bindParam(':nom_de_faculte', $nom_de_faculte);

			$resultUpdate->execute();

				echo "Mise à jour dans la base de donnée avec succes de la faculté \" ".$nom_de_faculte."\"";
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