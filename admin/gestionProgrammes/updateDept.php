<?php
	require_once "../connexionDB.php";
	require_once "../includes/verificationSession.php";
	require_once "../includes/functions.php";
	
	$id_unique_dept =$_GET['id_unique_dept']; 
	$nom_departement = $_GET['nom_departement'];
 	$faculte_du_dept = $_GET['faculte_du_dept'];
	
	$table = "UDM_departement";

	if( $id_unique_dept && $nom_departement && $nom_departement)
	{
		
		try
		{
			
			
			
			$sqlUpdate = "UPDATE $table 
					SET  nom_departement = :nom_departement, faculte_du_dept = :faculte_du_dept
					WHERE id_departement = $id_unique_dept";
			
			$resultUpdate= $conn->prepare($sqlUpdate);
			
			$resultUpdate->bindParam(':nom_departement', $nom_departement);
			$resultUpdate->bindParam(':faculte_du_dept', $faculte_du_dept);

			$resultUpdate->execute();

				echo "Mise à jour dans la base de donnée avec succes du département \" ".$nom_departement."\"";
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