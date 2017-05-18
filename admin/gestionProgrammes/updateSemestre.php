<?php
	require_once "../../connexionDB.php";
	require_once "../../includes/verificationSession.php";
	require_once "../../includes/functions.php";
	
	$id_unique_semestre = $_GET['id_unique_semestre'];
   	$libelle_semestre = $_GET['libelle_semestre'];
 	$detail_semestre = $_GET['detail_semestre'];
 	$annee = $_GET['annee'];
	$programme = $_GET['programme'];
	$table = "UDM_semestre";

	if( $id_unique_semestre && $libelle_semestre && $detail_semestre && $annee && $programme )
	{
		
		try
		{
			
			
			
			$sqlUpdate = "UPDATE $table 
					SET  libelle_semestre = :libelle_semestre, detail_semestre = :detail_semestre, annee= :annee, programme = :programme
					WHERE id_semestre = $id_unique_semestre
					";
			
			$resultUpdate= $conn->prepare($sqlUpdate);
			
			$resultUpdate->bindParam(':libelle_semestre', $libelle_semestre);
			$resultUpdate->bindParam(':detail_semestre', $detail_semestre);
			$resultUpdate->bindParam(':annee', $annee);
			$resultUpdate->bindParam(':programme', $programme);

			$resultUpdate->execute();

				echo "Mise à jour dans la base de donnée avec succes du semestre \"".$libelle_semestre." ".$annee."\"";
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